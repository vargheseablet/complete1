<?php
class Bank extends CI_Controller
{
	public function create_user()	//loads the user signin page
	{
		$this->load->view('bank/create_acc');
	}
	public function insert_db()		//passes the user data to the model method 'insert_into_db' 
	{
		$b1 = $_POST['uname'];		//username
		$b2 = $_POST['email'];		//email
		$b3 = $_POST['mob_no'];		//mobile number
		$b4 = $_POST['psw'];

		$create_info = array('user_name' => $b1, 'email' => $b2, 'mob_no' => $b3, 'password' => $b4);
		$this->load->model('bank_model');
		$db_stat = $this->bank_model->insert_into_db($create_info);

		if ($db_stat == 1) {
			$this->load->view('bank/login');  	//data successfully inserted
		}
		else{
			echo "Database error.Please Sign up again.";		//database error
		}
	}

	public function login()
	{
		$this->load->view('bank/login');	//load the login page
	}

	public function error()
	{
		$this->load->view('bank/error');  	//load the error page
	}

	public function authenticate()		//mobile number and password validation 
	{
		$n1= $_POST['mob_no'];
    	$n2= $_POST['psw'];

    	$user_info= array('mob_no' => $n1, 'password' => $n2
		);
		$this->load->model('bank_model');

		$db_pass= $this->bank_model->verify_user($user_info);	

		if ($db_pass == 1) 
		{
			$this->load->view('bank/hpg');
		}

		else
		{
			$this->load->view('bank/error');
		}
	}

	public function homepage()		//load the homepage 
	{
		$this->load->view('bank/hpg');
	}

	public function deposit()		//load the deposit page
	{
		$this->load->view('bank/deposit');
	}

	public function dep_auth()		
	{
		$dep1 = $_POST['mob_no'];   //Transaction to
		$dep2 = $_POST['amt'];
		$dep3 = $_POST['mob_no'];	//Transaction from
		$dep4 = "Deposit";			//Transaction type

		if($dep2 < 0)		//checking if the amount being deposited is negative
 		{
			$new_amt = 0;	//if yes, then make the amount = 0
		}
		else
		{
			$new_amt = $dep2;	//else continue
		}

		$this->load->model('bank_model');
		$bank_info = array('mob_no' => $dep1);
		$curr_user = $this->bank_model->getbank_data($bank_info);
		foreach ( $curr_user as $bal1) 
		{
        	$new_bal = $bal1['balance'] + $new_amt;			//addition of the deposited amount with the balance in the bank
        }
		
		$dep_info = array('mob_no' => $dep1, 'balance' =>$new_bal);
		$this->load->model('bank_model');
		$bank_stat = $this->bank_model->bank_db($dep_info);			//passing the new balance to the model


		$this->load->model('bank_model');
		$curr_id = $this->bank_model->getuser_data($bank_info);		

		foreach ( $curr_id as $id1) 
		{
        	$new_id = $id1['user_id'];
        }
        $txn_info = array(
        			'user_id' => $new_id,
        			'from_mob' => $dep3,
        			'to_mob' => $dep1,
        			'txn_amt' => $dep2,
        			'txn_type' => $dep4,
        			);

		$this->load->model('bank_model');
		$txn_stat = $this->bank_model->txn_db($txn_info);	//passing the above data to the model to be inserted into the transaction table

		if($bank_stat == 1 && $txn_stat == 1)
		{
			$this->load->view('bank/hpg');
		}
		else
		{
			$this->load->view('bank/error');
		}
	}

	public function withdraw()		//load the withdraw page
	{
		$this->load->view('bank/withdraw');
	}

	public function wdraw_auth()		
	{
		$wd1 = $_POST['mob_no'];   //Transaction to
		$wd2 = $_POST['amt'];
		$wd3 = $_POST['mob_no'];	//Transaction from
		$wd4 = "Withdraw";			//Transaction type

		if($wd2 < 0)		//checking if the amount being withdrawn is negative
 		{
			$new_amt = 0;	//if yes, then make the amount = 0
		}
		else
		{
			$new_amt = $wd2;	//else continue
		}

		$this->load->model('bank_model');
		$bank_info = array('mob_no' => $wd1);
		$curr_user = $this->bank_model->getbank_data($bank_info);
		foreach ( $curr_user as $bal1) 
		{
			if ($bal1['balance'] < $new_amt) 				//Checking if the balance is less than the amount being withdrawn
			{
				echo "Insufficent Balance";					//if yes 
			}
			else 											//if no continue
			{	
        		$new_bal = $bal1['balance'] - $new_amt;			//subtraction of the withdrawn amount from the balance in the bank
			}
        }
		
		$wd_info = array('mob_no' => $wd1, 'balance' =>$new_bal);
		$this->load->model('bank_model');
		$bank_stat = $this->bank_model->bank_db($wd_info);			//passing the new balance to the model



		$this->load->model('bank_model');
		$curr_id = $this->bank_model->getuser_data($bank_info);		

		foreach ( $curr_id as $id1) 
		{
        	$new_id = $id1['user_id'];
        }
        $txn_info = array(
        			'user_id' => $new_id,
        			'from_mob' => $wd3,
        			'to_mob' => $wd1,
        			'txn_amt' => $wd2,
        			'txn_type' => $wd4,
        			);

		$this->load->model('bank_model');
		$txn_stat = $this->bank_model->txn_db($txn_info);	//passing the above data to the model to be inserted into the transaction table

		if($bank_stat == 1 && $txn_stat == 1)
		{
			$this->load->view('bank/hpg');
		}
		else
		{
			$this->load->view('bank/error');
		}
	}	
	public function transfer()		//load the transfer page
	{
		$this->load->view('bank/transfer');
	}
	public function tr_auth()		
	{
		$tr1 = $_POST['to_mob_no'];   //Transaction to
		$tr2 = $_POST['amt'];
		$tr3 = $_POST['from_mob_no'];	//Transaction from
		$tr4 = "Transfer";			//Transaction type

		if($tr2 < 0)		//checking if the amount being transfered is negative
 		{
			$new_amt = 0;	//if yes, then make the amount = 0
		}
		else
		{
			$new_amt = $tr2;	//else continue
		}

		$this->load->model('bank_model');
		$bank_info = array('mob_no' => $tr3);
		$curr_user = $this->bank_model->getbank_data($bank_info);
		foreach ( $curr_user as $bal1) 
		{
			if ($bal1['balance'] < $new_amt) 				//Checking if the balance is less than the amount being withdrawn
			{
				echo "Insufficent Balance";					//if yes 
			}
			else 											//if no continue
			{	
        		$new_bal_from = $bal1['balance'] - $new_amt;		//subtraction of the withdrawn amount from the balance in the bank
			}
        }

		$tr_info = array('mob_no' => $tr3, 'balance' => $new_bal_from);
		$this->load->model('bank_model');
		$bank_stat = $this->bank_model->bank_db($tr_info);			//passing the new balance to the model

		



		$this->load->model('bank_model');
		$bank_info1 = array('mob_no' => $tr1);
		$other_user = $this->bank_model->getbank_data($bank_info1);
		foreach ( $other_user as $bal2) 
		{
        	$new_bal1 = $bal2['balance'] + $new_amt;			//addition of the deposited amount with the balance in the bank
        }

		$tr_info1 = array(
					'mob_no' => $tr1, 
					'balance' => $new_bal1
					);
		$this->load->model('bank_model');
		$bank_stat1 = $this->bank_model->bank_db($tr_info1);			//passing the new balance to the model

		$this->load->model('bank_model');
		$curr_id = $this->bank_model->getuser_data($bank_info);		
		foreach ( $curr_id as $id1) 
		{
        	$new_id = $id1['user_id'];
        }
        $txn_info = array(
        			'user_id' => $new_id,
        			'from_mob' => $tr3,
        			'to_mob' => $tr1,
        			'txn_amt' => $tr2,
        			'txn_type' => $tr4,
        			);

		$this->load->model('bank_model');
		$txn_stat = $this->bank_model->txn_db($txn_info);	//passing the above data to the model to be inserted into the transaction table

		if($bank_stat == 1 && $txn_stat == 1 && $bank_stat1 == 1)
		{
			$this->load->view('bank/hpg');
		}
		else
		{
			$this->load->view('bank/error');
		}
	}
	public function trans_view()
	{
		$this->load->view('bank/trans_view');
	}

	public function trans_slip()
	{	
		$trans1 = $_POST['mob_no'];
		$this->load->model('bank_model');
		$trans_info = $this->bank_model->get_trans_db($trans1);
		$this->load->view('bank/trans_slip',array('trs' => $trans_info));
	}

	public function about_user()
	{
		$this->load->view('bank/about_user');
	}
	public function user_details()
	{	
		$abt1 = $_POST['mob_no'];
		$this->load->model('bank_model');
		$abt_info = $this->bank_model->get_user_data($abt1);
		$bal_info = $this->bank_model->getbank_data(array('mob_no' => $abt1));
		$this->load->view('bank/user_details',array('u_d1' => $abt_info, 'u_d2' => $bal_info));
	}	
}

