<?php

class StockFunction
{
    function showHeader()
    {
        ?>
        <header>
            <h1>Company Stocks</h1>
            <nav>
                <ul>
                    <li><a href="<?= $_SERVER['PHP_SELF'] ?>">Home</a></li>
                    <li><a href="<?= $_SERVER['PHP_SELF'] ?>?t=reset">Reset</a></li>
                    <li><a href="<?= $_SERVER['PHP_SELF'] ?>?t=stocks">Get Stocks</a></li>
                    <li><a href="<?= $_SERVER['PHP_SELF'] ?>?t=view">View Stocks</a></li>
                    <li><a href="<?= $_SERVER['PHP_SELF'] ?>?t=add">Add Stock</a></li>
                </ul>
            </nav>
        </header>
        <?php
    }

    function showFooter()
    {
        ?>
        <footer>
            &copy; Christian Hur. I own this!
        </footer>
        <?php

    }

    function showStocksTable($rows)
    {
        $counter = 1; ?>
        <table class="stocks_table">
            <thead>
            <th>No.</th>
            <th>Company</th>
            <th>Symbol</th>
            <th>Sector</th>
            <th>Price ($)</th>
            </thead>
            <tbody>
        <?php
        // Print each row
        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . $counter++ ."</td>";
            echo "<td>" . $row['company'] . "</td>";
            echo "<td>" . $row['symbol'] . "</td>";
            echo "<td>" . $row['sector'] . "</td>";
            echo "<td>" . number_format($row['price'],2) . "</td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    }

    function canGetFile($filename){
        if(file_exists($filename)){
            return true;
        }
        return false;
    }

    function processData($filename,$db){
        $mode = "r";
        $separator = ";";
        // Check if file exists
        $result = $this->canGetFile($filename);
        if($result){
            // Open a text file for reading
            $fp = fopen($filename,$mode);

            // Read each line
            while(!feof($fp)){
                $line = fgets($fp);  //1;CVR Refining, LP;CVRR;Energy;625.17
                $data = explode($separator,$line);
                // ["1","CVR Refining, LP","CVRR","Energy","625.17"]
                if(!$db->insertRecord(TABLE_STOCK,$data)){
                    fclose($fp);
                    return false;  //stop execution
                }
            }
            fclose($fp);
        }else{
            return false;
        }
        return true;
    }

    function showAddForm(){
        ?>
        <h1>Add New Stock</h1>
        <form class="stocks_form" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="stocks_controls">
                <label for="company">Company</label>
                <input id="company" name="company" required>
            </div>
            <div class="stocks_controls">
                <label for="symbol">Symbol</label>
                <input id="symbol" name="symbol" required>
            </div>
            <div class="stocks_controls">
                <label for="sector">Sector</label>
                <input id="sector" name="sector" required>
            </div>
            <div class="stocks_controls">
                <label for="price">Price</label>
                <input id="price" name="price" required>
            </div>
            <div class="stocks_controls">
                <input class="btn-submit" type="submit" name="submit">
                <input class="btn-reset" type="reset" name="reset">
            </div>
        </form>
        <?php
    }
}