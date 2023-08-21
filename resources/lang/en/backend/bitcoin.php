<?php
return [

    'title' => 'Bitcoin Management',

    'balance' => 'Balance',

    'connection_error' => 'Could not establish a connection to the node. Please <a href=":url" class="alert-link">click here</a> to configure the settings.',

    'generateaddress' => [
        'title' => 'Receive',
        'regenerate' => 'Generate New Wallet',
    ],

    'transactions' => [
        'title' => 'Transactions',
        'no_entries' => 'No transactions available.',

        'category' => '#',
        'user' => 'User',
        'txid' => 'TXID',
        'status' => 'Status',
        'wallet' => 'Wallet',
        'amount' => 'Amount',
        'date' => 'Date',
        'id' => 'ID',

        'confirmed' => 'Confirmed',
        'confirmations' => ':confirms/:confirms_needed confirmations',
        'waiting' => 'Payment Pending',
    ],

    'primarywallet' => [
        'title' => 'Set Primary Wallet',
        'walletaddress' => 'BTC Address',
        'submit_button' => 'Save',
        'info' => 'Bitcoins will be forwarded to the primary wallet once the balance reaches <b>0.00500 BTC</b>.',
        'unknown_error' => 'An unknown error occurred.',
        'successfully' => 'Bitcoin address <b>:address</b> has been set as the primary wallet.',
        'successfully2' => 'Primary wallet has been removed.',
    ],

    'sendbtc' => [
        'title' => 'Send',
        'walletaddress' => 'BTC Address',
        'submit_button' => 'Send',
        'amount' => 'Amount',
        'fee' => 'Fee',
        'fee_info' => '<b>Recommended:</b> :btc BTC / Satoshi: :satoshi',
        'unknown_error' => 'An unknown error occurred.',
        'successfully' => '<b>:amount</b> sent to address <b>:address</b>.',
    ],

];
