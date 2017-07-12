var RaiWallet = require('../Wallet');
var wallet;
var registered = false;
var lastRetrieved = 0;
var recentEmpty = true;
var lastWorkRetrieved = 0;
var waitingForSingleWork = false;

$(document).ready(function(){
    
    
    function toast(title, msg)
    {
        $.toast({
            heading: title,
            text: msg,
            position: 'bottom-right',
            stack: false,
            hideAfter: 10000,
            loader: false
        });
    }
    
    function alertError(msg)
    {
        $.toast({
            heading: 'Error',
            text: msg,
            icon: 'error',
            position: 'bottom-right',
            hideAfter: 10000,
            loader: false
        })
    }
    
    function alertSuccess(msg)
    {
        $.toast({
            heading: 'Success',
            text: msg,
            icon: 'success',
            position: 'bottom-right',
            hideAfter: 10000,
            loader: false
        })
    }
    
    function alertInfo(msg)
    {
        $.toast({
            text: msg,
            icon: 'info',
            position: 'bottom-right',
            hideAfter: 10000,
            loader: false
        })
    }
    
    function addAccountToGUI(accountObj)
    {
        $('.accounts ul').append('<li><div class="row"><div class="col-xs-12"><span>'+accountObj.account+'</span></div></div></li>');
        $('#send-select').append('<option>'+accountObj.account+' <span>('+(accountObj.balance / 1000000).toFixed(8)+' XRB)</span></option>');
        $('#receive-select').append('<option>'+accountObj.account+' <span>('+(accountObj.balance / 1000000).toFixed(8)+' XRB)</span></option>');
        $('#change-select').append('<option>'+accountObj.account+'</option>');
            //var selected = $('#change-select').val();
            //var repr = wallet.getRepresentative(selected);
            //$('#acc-repr').val(repr);
        $('#acc-select').append('<option>'+accountObj.account+'</option>');
    }
    
    function addRecentRecToGui(txObj)
    {
        if(recentEmpty)
            $('.recent').html('');
        recentEmpty = false;
        $('.recent').append('<ul id="'+txObj.hash+'"><li><div class="row">'+
                                '<div class="col-xs-3">'+
                                    '<b class="green">Received</b>'+
                                '</div>'+
                                '<div class="col-xs-4">'+txObj.date+'</div>'+
                                '<div class="col-xs-5 text-right">'+
                                    '<span class="green">'+(txObj.amount / 1000000).toFixed(8)+'</span> XRB'+
                                '</div>'+
                            '</div></li></ul>');
    }
    
    function removeRecentFromGui(hash)
    {
        var elem = $('.recent').find('#'+hash);
        
        refreshBalances();
        
        elem.fadeOut(1500, function(){elem.remove()});
    }
    
    function addRecentSendToGui(txObj)
    {
		if(recentEmpty)
            $('.recent').html('');
        recentEmpty = false;
        $('.recent').append('<ul id="'+txObj.hash+'"><li><div class="row">'+
                                '<div class="col-xs-3">'+
                                    '<b class="red">Sent</b>'+
                                '</div>'+
                                '<div class="col-xs-3">'+txObj.date+'</div>'+
                                '<div class="col-xs-6 text-right">'+
                                    '<span class="red">'+(txObj.amount / 1000000).toFixed(8)+'</span> XRB'+
                                '</div>'+
                            '</div></li></ul>');
    }
    
    function emptyRecent()
    {
        recentEmpty = true;
        $('.recent').append('<div class="row"><div class="col-xs-12" style="color:#888">There is nothing to show here.</div></div>');
    }
    
    function addTxToGui(txObj)
    {
        if(txObj.type == 'send' || txObj.type == 'receive')
        {
            var color = txObj.type == 'send' ? 'green' : 'red';
            var type = txObj.type == 'send' ? 'Send' : 'Receive';
            $('.txs').append('<div class="row">'+
                                    '<div class="col-xs-3">'+
                                        '<b>'+type+'</b>'+
                                    '</div>'+
                                    '<div class="col-xs-3">'+txObj.date+'</div>'+
                                    '<div class="col-xs-6 text-right">'+
                                        '<span class="'+color+'">'+(txObj.amount / 1000000).toFixed(8)+'</span> XRB'+
                                    '</div>'+
                                '</div>');
        }
        else if(txObj.type == 'change')
        {
            $('.txs').append('<div class="row">'+
                                    '<div class="col-xs-3">'+
                                        '<b>Change Representative</b>'+
                                    '</div>'+
                                    '<div class="col-xs-3">'+txObj.date+'</div>'+
                                    '<div class="col-xs-6 text-right">'+
                                        '<span class="green">'+txObj.representative+'</span>'+
                                    '</div>'+
                                '</div>');
        }
    }
    
    function refreshBalances()
    {
        var balance = wallet.getWalletBalance();
        var pending = wallet.getWalletPendingBalance();
        
        $('#pending').html((pending / 1000000).toFixed(6));
        $('#balance').html((balance / 1000000).toFixed(6));
    }
    
    function sync(walletCipher)
    {
        $.post('ajax.php', 'action=sync&data='+walletCipher);
    }
    
    function subscribeAccount(account)
    {
        $.post('ajax.php', 'action=subscribeAccount&account='+account+'&pubkey='+keyFromAccount(account), function(data){
            data = JSON.parse(data);
            
            if(data.status == 'success')
            {
                try{
                    wallet.setAccountAsSubscribed(account);
                }catch(e){
                    // account not in wallet :P
                    console.log("Trying to subscribe an account not in the wallet.");
                }
            }
        })
    }
    
    function recheckSubscriptions()
    {
        //TODO
    }
  
    function recheckBroadcastedBlocks()
    {
        var blocks = wallet.getNonBroadcastedBlocks();
        // TODO
    }
    
    function broadcastBlock(blk)
    {
        var json = blk.getJSONBlock();
        var obj = JSON.parse(json);
        var hash = blk.getHash(true);
        var guiHash;
        if(blk.getType() == 'open' || blk.getType() == 'receive')
            guiHash = blk.getSource();
        else
            guiHash = blk.getHash(true);
        $.post('ajax.php', 'action=broadcast&hash='+hash+"&data="+json, function(data){
            data = JSON.parse(data);
            if(data.status == 'success')
            {
                wallet.removeReadyBlock(hash);
                removeRecentFromGui(guiHash);
                console.log('Block broadcasted to network: '+hash);
				alertInfo(blk.getType()+" block broadcasted to network.");
                sync(wallet.pack());
            }
            else
            {
                console.warn('Error broadcasting block: '+hash+". Error: "+data.msg);
            }
        });
    }
	
	function rebroadcastBlock(blockHash)
	{
		wallet.addBlockToReadyBlocks(wallet.getBlockFromHash(blockHash));
	}
    
    function updateReceiveQr(account = null)
    {
        var acc = account ? account : $('#receive-select').val().split(' ')[0];
        var am = $('#receive-amount').val();
        $('#qr .img').html('<img style="height: 200px; margin-left: auto; margin-right: auto;" src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=raiblocks:'+acc+'?amount='+am+'">')
        $('.qr-bot').html('<code>'+acc+'</code>');
        $('#qr').addClass('well');
    }
    
    function getPendingBlocks()
    {
        $.post('ajax.php', 'action=getPending&last='+lastRetrieved, function(data){
            data = JSON.parse(data);
            if(data.status == 'success')
            {
                lastRetrieved = data.last > lastRetrieved ? data.last : lastRetrieved;
                for(let i in data.data)
                {
                    var blk = data.data[i];
                    var acc = blk.block.destination;
                    wallet.addPendingReceiveBlock(blk.hash, acc, blk.amount);
                    
                    var txObj = {account: acc, amount: blk.amount, date: blk.time, hash: blk.hash}
                    addRecentRecToGui(txObj);
                }
                sync(wallet.pack());
                refreshBalances();
            }
            setTimeout(getPendingBlocks, 5000);
        });
    }
    
    function remoteWork(hash, acc)
    {
        $.post('ajax.php', 'action=remoteWork&hash='+hash, function(data)
        {
            data = JSON.parse(data);
            if(data.status == 'success')
            {
                console.log('Work requested for block ' + hash);
                wallet.workPoolAdd(hash, acc);
            }
        });
    }
    
    function getReadyWork()
    {
        if(wallet.waitingRemoteWork())
        {
            $.post('ajax.php', 'action=getRemoteWork&last='+lastWorkRetrieved, function(data){
                data = JSON.parse(data);
                if(data.status == 'success')
                {
                    for(let i in data.data)
                    {
                        wallet.updateWorkPool(data.data[i].hash, data.data[i].work);
                    }
                    lastWorkRetrieved = data.last;
                }
            });
        }
        setTimeout(getReadyWork, 3000);
    }
    
    function syncWorkPool()
    {
        var pool = wallet.getWorkPool();
        for(var i in pool)
        {
            if(!pool[i].worked)
            {
                remoteWork(pool[i].hash, pool[i].account);
            }
        }
      setTimeout(syncWorkPool, 5000);
    }
    
    function getSingleWork(hash, acc)
    {
        if(waitingForSingleWork)
            return;
        waitingForSingleWork = true;
        
        var request = function()
        {
            if(waitingForSingleWork)
            {
                $.post('ajax.php', 'action=getSingle&hash='+hash, function(data){
                    data = JSON.parse(data);
                    if(data.status == 'success')
                    {
                        if(data.found == true)
                        {
                            if(data.worked)
                            {
                                wallet.updateWorkPool(hash, data.work);
                                waitingForSingleWork = false;
                            }
                            else
                                setTimeout(request, 3000);
                        }
                        else
                        {
                            // not found? submit it
                            remoteWork(hash, acc);
                        }
                    }
                    else
                        setTimeout(request, 3000);
                });
            }
        }
        request();
    }
    
    function cancelWait()
    {
        waitingForSingleWork = false;
    }
    
    function getWalletTxs(offset = 0)
    {
        $.post('ajax.php', 'action=getTransactions&offset='+offset, function(data){
            data = JSON.parse(data);

            if(data.status == 'success')
            {
                for(var i in data.data)
                {
                    addTxToGui(data[i]);
                }
            }
        });
    }
  
    function checkReadyBlocks()
    {
        var blk = wallet.getNextReadyBlock();
        if(blk !== false)
            broadcastBlock(blk);
        setTimeout(checkReadyBlocks, 5000);
    }
    
    
    function debugAllWallet()
    {
        wallet.debug();
        setTimeout(debugAllWallet, 3000);
    }
    
    function goToWallet()
    {
        // load wallet template
        $('.landing').html('<div class="transition-overlay"><span>RAIWALLET</span><br/><i class="fa fa-circle-o-notch fa-spin fa-fw"></i></div>');
        $(".modal").modal('hide');

        // load elements and display wallet
        var accounts = wallet.getAccounts();
        var total_balance = 0;
        for(let i in accounts)
        {
            addAccountToGUI(accounts[i]);
        }

        var recent = wallet.getRecentTxs();
        if(recent)
        {
            for(let i in recent)
                addRecentRecToGui(recent[i]);
        }
        else
            emptyRecent();
        
        //debugAllWallet();
        refreshBalances();
        getPendingBlocks();
        getWalletTxs();
        getReadyWork();
        syncWorkPool();
        checkReadyBlocks();  
		var selected = $('#acc-select').val();
        var last = wallet.getLastNBlocks(selected, 20);
        clearBlocksFromGui();
        
        for(let i in last)
            addBlockToGui(last[i]);
        
        
        setTimeout(function(){
            $('.landing').fadeOut(500, function(){$('.landing').remove(); $('.wallet-wrapper').fadeIn();});
        }, 2500);
    }
    
    function mainLoop()
    {
        getPendingBlocks();
        getWalletTxs();
        getReadyWork();
        syncWorkPool();
        debugAllWallet();
        setTimeout(mainLoop, 5000);
    }
    
    
    $('.form-register').submit(function(){
        // check pass
        if($('#psw').val() == $('#psw2').val())
        {
            // create wallet and send to server
            wallet = new RaiWallet($('#psw').val());
            var seed = wallet.createWallet();
            var pack = wallet.pack();
            var email = $('#email').val();
            $('input').prop('disabled', true);
            $.post('ajax.php', 'action=register&email='+email+'&wallet='+pack, function(data){
                data = JSON.parse(data);
                
                if(data.status == 'success')
                {
                    alertInfo('Wallet successfully registered.');
                    $('#wallet_id_reg').html(data.identifier);
                    $('#wallet_seed_reg').html(seed);
                    $('.registering').fadeOut(500, function(){
                        $('.registered').fadeIn(500);
                    });
                    registered = true;
                    subscribeAccount(wallet.getAccounts()[0].account);
                }
                else
                {
                    alertError(data.msg);
                }
                $('input').prop('disabled', false);
            });
        }
        else
            alertError('Passwords do not match.');
        
        return false;
        
    });
    
    $('.form-login').submit(function(){
        var serialize = $(this).serialize();
        
        $('input').prop('disabled', true);
        $.post('ajax.php', 'action=login&'+serialize, function(data){
            data = JSON.parse(data);
            
            if(data.status == 'success')
            {
                // decrypt wallet and check checksum
                wallet = new RaiWallet($('#password').val());
                $('#password').val('');
                
                try{
                    wallet.load(data.wallet);
                }catch(e){
                    alertError('Error decrypting wallet. Check that the password is correct.');
                    $('input').prop('disabled', 0);
                    console.log(e);
                    return;
                }
                
                goToWallet();
            }
            else
            {
                alertError(data.msg);
            }
            $('input').prop('disabled', 0);            
        });
        return false;
    });
    
    $('.gotowallet').click(goToWallet);
    
    $('.form-send').submit(function(event){
        event.preventDefault();
        // reset field errors
        $('#to').css('border-color', '#ccc');
        $('#samount').css('border-color', '#ccc');
        var error = false;
        
        // from
        var from = $('#send-select').val();
        from = from.split(' ')[0];
        
        // check address
        var to = $('#to').val();
        try{
            keyFromAccount(to);
        }catch(e){
            alertError('Invalid XRB address.');
            $('#to').css('border-color', '#880000');
            error = true;
        }
        
        var balance = wallet.getAccountBalance(from);
        
        var amount = parseFloat($('#samount').val());
        var amountRai = parseInt(amount * 1000000);
        if(amount <= 0)
        {
            alertError('Invalid amount.');
            $('#samount').css('border-color', '#880000');
            error = true;
        }
        
        if(amountRai > balance)
        {
            alertError('Amount is greater than balance in the selected account.');
            $('#samount').css('border-color', '#880000');
            error = true;
        }
        
        if(!error)
        {
            try{
                var hash = wallet.addPendingSendBlock(from, to, amountRai);
                refreshBalances();
                $(".modal").modal('hide');
                alertInfo("Transaction built successfully. Waiting for work ...");
				addRecentSendToGui({date: "Just now", amount: amountRai, hash: hash});
            }catch(e){
                alertError('Ooops, something happened: ' + e.message);
            }
                
        }
        return false;
    });
    
    $('#generate_acc').click(function(){
        var newAccount = wallet.newKeyFromSeed();
        addAccountToGUI({account: newAccount, balance: 0});
        var pack = wallet.pack();
        sync(pack);
        subscribeAccount(newAccount);
        alertSuccess('New account added to wallet.');
        wallet.useAccount(newAccount);
        updateReceiveQr(newAccount);
    });
    
    $('#change_repr').click(function(){
        var selected = $('#change-select').val();
        var repr = $('#acc-repr').val();
        
        try{
            keyFromAccount(repr);
        }catch(e){
            alertError("Invalid representative account.");
            return;
        }
        
        try{
            wallet.addPendingChangeBlock(selected, repr);
            var pack = wallet.pack();
            sync(pack);
            alertSuccess("Representative changed for account " + selected);
        }catch(e){
            console.log(e);
            alertError('Something happened: ' + e);
        }
    });
    
    $('#receive-select').change(function(){
        updateReceiveQr();
    });
    
    $('#receive-amount').keyup(function(){
        updateReceiveQr();
    });
    
    $('#change-select').change(function(){
        var selected = $('#change-select').val();
        var repr = wallet.getRepresentative(selected);
        $('#acc-repr').val(repr);
        console.log(repr);
    });
    
    
    $('#acc-select').change(function(){
        var selected = $('#acc-select').val();
        var last = wallet.getLastNBlocks(selected, 20);
        clearBlocksFromGui();
        
        for(let i in last)
            addBlockToGui(last[i]);
    });
	
	$('#refresh').click(function(){
		wallet.recalculateWalletBalances();
	});
    
    
    function addBlockToGui(block)
    {
		if(block.getType() != 'change')
		{
			if(block.getType() == 'send')
			{
				var color = 'red';
				var fromto = 'To: ';
				var symbol = '-';
				//var account = block.getDestination();
			}
			else
			{
				var color = 'green';
				var fromto = 'From: ';
				var symbol = '+';
				//var account = block.getSender();
			}
			var type = block.getType();
			
			$('.txs ul').append(
				'<li id="tx_' + block.getHash(true) + '">'+
					'<div class="row">'+
						'<div class="col-sm-2">'+
							'<span class="blk-type '+type+'">'+block.getType()+'</span><br/>'+
							'<span class="'+color+' blk-amount">'+symbol+block.getAmount().toFixed(6)+'</span>'+
						'</div>'+
						'<div class="col-sm-6">'+
							'<span class="blk-hash">'+block.getHash(true)+'</span><br/>'+
							'<span class="blk-account">'+block.getAccount()+'</span>'+
						'</div>'+
						'<div class="col-sm-4 text-center">'+
							'<button type="button" data-toggle="tooltip" data-placement="left" title="View Block" class="btn btn-default gborder" style="margin-right:5px" onclick="$(\'.txs ul\').find(\'#json_'+block.getHash(true)+'\').fadeToggle();"><i class="fa fa-angle-down" aria-hidden="true"></i></button>'+
							'<button type="button" data-toggle="tooltip" data-placement="right" title="Rebroadcast" class="btn btn-default gborder rebroadcast" id="rebroadcast_'+block.getHash(true)+'" ><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>'+
						'</div>'+
						'<div class="col-sm-12" style="display:none; margin-top:15px" id="json_'+block.getHash(true)+'">'+
							'<pre>'+block.getJSONBlock()+'</pre>'+
						'</div>'+
					'</div>'+
					/*
					'<div class="row text-center">'+
						'<div class="col-sm-2"></div>'+
						'<div class="col-sm-6">'+
							'<span class="blk-account">'+block.getAccount()+'</span>'+
						'</div>'+
						'<div class="col-sm-4 blk-amount">'+
							'<span class="'+color+'">'+symbol+block.getAmount().toFixed(6)+'</span>'+
						'</div>'+
					'</div>'+
					*/
				'</li>'
			);
		}
		else
		{
			var type = "change";
			$('.txs ul').append(
				'<li id="tx_' + block.getHash(true) + '">'+
					'<div class="row">'+
						'<div class="col-sm-2">'+
							'<span class="blk-type '+type+'">'+block.getType()+'</span>'+
						'</div>'+
						'<div class="col-sm-6">'+
							'<span class="blk-hash">'+block.getHash(true)+'</span><br/>'+
							'<span class="blk-account">'+block.getRepresentative()+'</span>'+
						'</div>'+
						'<div class="col-sm-4 text-center">'+
							'<button type="button" data-toggle="tooltip" data-placement="left" title="View Block" class="btn btn-default gborder" style="margin-right:5px" onclick="$(\'.txs ul\').find(\'#json_'+block.getHash(true)+'\').fadeToggle();"><i class="fa fa-angle-down" aria-hidden="true"></i></button>'+
							'<button type="button" data-toggle="tooltip" data-placement="right" title="Rebroadcast" class="btn btn-default gborder rebroadcast" id="rebroadcast_'+block.getHash(true)+'" ><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>'+
						'</div>'+	
						'<div class="col-sm-12" style="display:none; margin-top:15px" id="json_'+block.getHash(true)+'">'+
							'<pre>'+block.getJSONBlock()+'</pre>'+
						'</div>'+
					'</div>'+
				'</li>'
			);
		}
		$('[data-toggle="tooltip"]').tooltip(); 
    }
	
	
	$('.txs ul').on('click', '.rebroadcast', function (){
		var hash = $(this).attr('id').replace('rebroadcast_', '');
		rebroadcastBlock(hash);
    });
	
	$('#seed_button').click(function(){
		try{
			$('#seed_backup').val(wallet.getSeed($('#seed_pass').val()));
			$('#seed_pass').val('');
			setTimeout(function(){
				$('#seed_backup').val($('#seed_backup').attr('value'));
			}, 30000);
			alertInfo('Seed will be visible for 30 seconds.');
		}catch(e){
			alertError('Incorrect password');
		}
	});
	
	$('#download_wallet').click(function(){
		var data = wallet.pack();
		var link = document.createElement('a');
		link.download = 'RaiWalletBackUp.dat';
		var blob = new Blob([data], {type: 'text/plain'});
		link.href = window.URL.createObjectURL(blob);
		link.click();
	});
	
    function clearBlocksFromGui()
    {
        $('.txs ul').html('');
    }
    
    
});