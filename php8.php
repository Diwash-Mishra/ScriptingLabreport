<!DOCTYPE html>
<html>
<head>
    <title>Bank Account</title>
</head>
<body> 
<h2>Bank Account Management</h2>
<form method="post" action="">
    <label for="accountNumber">Account Number:</label><br>
    <input type="number" id="accountNumber" name="accountNumber" required><br><br>
    <label for="amount">Amount:</label><br>
    <input type="number" id="amount" name="amount" required><br><br>
    <input type="submit" name="deposit" value="Deposit">  
    <input type="submit" name="withdraw" value="Withdraw">
</form>
</body>
</html>
<?php
session_start();
class BankAccount {
    private $balance;
    public function __construct() {
        $this->balance = 0;
    }
    public function deposit($amount) {
        $this->balance += $amount;
        echo "Deposited $amount Successfully.<br>";
    }
    public function withdraw($amount) {
        if ($this->balance >= $amount) {
            $this->balance -= $amount;
            echo "Withdrawn $amount Successfully.<br>";
        } else {
            echo "Insufficient funds!<br>";
        }
    }
    public function getBalance() {
        return $this->balance;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accountNumber = $_POST['accountNumber'];
    $amount = $_POST['amount'];
    if (!isset($_SESSION['bankAccounts'][$accountNumber])) {
        $_SESSION['bankAccounts'][$accountNumber] = new BankAccount();
    }
    $bankAccount = $_SESSION['bankAccounts'][$accountNumber];
    if (isset($_POST['deposit'])) {
        $bankAccount->deposit($amount);
    } elseif (isset($_POST['withdraw'])) {
        $bankAccount->withdraw($amount);
    }
    echo "Current balance: $" . $bankAccount->getBalance() . " of Account " . $accountNumber . ".<br>";
}
?>