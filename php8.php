
Question nai bujina so i dont know

<!DOCTYPE html>
<html>
<head>
    <title>Bank Account Management</title>
</head>
<body>
    <h2>Bank Account Management</h2>
    <form method="post">
        Enter Account Number: <input type="text" name="accountNumber" required><br><br>
        Enter Initial Balance: <input type="number" name="initialBalance" step="any" required><br><br>
        <input type="submit" value="Create Account">
    </form>

    <?php
    class BankAccount {
        private $accountNumber;
        private $balance;

        public function __construct($accountNumber, $initialBalance) {
            $this->accountNumber = $accountNumber;
            $this->balance = $initialBalance;
        }

        public function getAccountNumber() {
            return $this->accountNumber;
        }

        public function getBalance() {
            return $this->balance;
        }

        public function deposit($amount) {
            if ($amount > 0) {
                $this->balance += $amount;
                return true;
            } else {
                return false; // Cannot deposit negative amount
            }
        }

        public function withdraw($amount) {
            if ($amount > 0 && $amount <= $this->balance) {
                $this->balance -= $amount;
                return true;
            } else {
                return false; // Insufficient balance or negative amount
            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get input from the form
        $accountNumber = $_POST['accountNumber'];
        $initialBalance = $_POST['initialBalance'];

        // Create a new BankAccount instance with user input
        $account = new BankAccount($accountNumber, $initialBalance);

        // Display account details
        echo "<h3>Account Created Successfully</h3>";
        echo "Account Number: " . $account->getAccountNumber() . "<br>";
        echo "Initial Balance: " . $account->getBalance() . "<br>";
    }
    ?>
</body>
</html>
