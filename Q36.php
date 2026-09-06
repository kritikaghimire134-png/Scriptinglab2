<?php

if (isset($_POST['calculate'])) {

    $income = $_POST['income'];
    $gender = $_POST['gender'];

    $remaining = $income;

    $tax1 = 0;
    $tax2 = 0;
    $tax3 = 0;
    $tax4 = 0;
    $tax5 = 0;

    /* First slab: 1,000,000 at 1% */

    if ($remaining > 0) {

        $amount = min($remaining, 1000000);

        $tax1 = $amount * 0.01;

        $remaining -= $amount;
    }


    /* Second slab: 500,000 at 10% */

    if ($remaining > 0) {

        $amount = min($remaining, 500000);

        $tax2 = $amount * 0.10;

        $remaining -= $amount;
    }


    /* Third slab: 1,000,000 at 20% */

    if ($remaining > 0) {

        $amount = min($remaining, 1000000);

        $tax3 = $amount * 0.20;

        $remaining -= $amount;
    }


    /* Fourth slab: 1,500,000 at 27% */

    if ($remaining > 0) {

        $amount = min($remaining, 1500000);

        $tax4 = $amount * 0.27;

        $remaining -= $amount;
    }


    /* Fifth slab: Above 4,000,000 at 29% */

    if ($remaining > 0) {

        $tax5 = $remaining * 0.29;
    }


    $total_tax = $tax1 + $tax2 + $tax3 + $tax4 + $tax5;


    /* Female discount */

    $discount = 0;

    if ($gender == "female") {

        $discount = $total_tax * 0.10;

        $total_tax = $total_tax - $discount;
    }


    $net_income = $income - $total_tax;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Income Tax Calculator</title>
</head>

<body>

<h2>Nepal Income Tax Calculator</h2>

<form method="post">

    Annual Taxable Income:

    <input type="number"
           name="income"
           min="0"
           required>

    <br><br>

    Gender:

    <select name="gender" required>

        <option value="male">Male</option>

        <option value="female">Female</option>

    </select>

    <br><br>

    <input type="submit"
           name="calculate"
           value="Calculate Tax">

</form>


<?php if (isset($_POST['calculate'])) { ?>

<hr>

<h2>Tax Calculation</h2>

<table border="1" cellpadding="10">

<tr>
    <th>Description</th>
    <th>Tax Amount (NPR)</th>
</tr>

<tr>
    <td>Annual Taxable Income</td>
    <td><?php echo number_format($income, 2); ?></td>
</tr>

<tr>
    <td>Tax on first NPR 1,000,000 (1%)</td>
    <td><?php echo number_format($tax1, 2); ?></td>
</tr>

<tr>
    <td>Tax on next NPR 500,000 (10%)</td>
    <td><?php echo number_format($tax2, 2); ?></td>
</tr>

<tr>
    <td>Tax on next NPR 1,000,000 (20%)</td>
    <td><?php echo number_format($tax3, 2); ?></td>
</tr>

<tr>
    <td>Tax on next NPR 1,500,000 (27%)</td>
    <td><?php echo number_format($tax4, 2); ?></td>
</tr>

<tr>
    <td>Tax above NPR 4,000,000 (29%)</td>
    <td><?php echo number_format($tax5, 2); ?></td>
</tr>

<tr>
    <td>Female Discount (10%)</td>
    <td><?php echo number_format($discount, 2); ?></td>
</tr>

<tr>
    <th>Total Tax Payable</th>
    <th><?php echo number_format($total_tax, 2); ?></th>
</tr>

<tr>
    <th>Net Income After Tax</th>
    <th><?php echo number_format($net_income, 2); ?></th>
</tr>

</table>

<?php } ?>

</body>
</html>