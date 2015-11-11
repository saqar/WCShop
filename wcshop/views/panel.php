<?php

require_once "handlers/panel.php";

?>

<section id="panel-box">
    <article>
        <span>Hello <?php echo $username; ?>!</span>
        <span>You have <?php echo $dp; ?> donate points.</span>
        <span><button id="logout">Logout</button></span>
    </article>
    <article>
        <span id="message"></span>
    </article>
    <table>
        <tr>
            <td>Item</td>
            <td>Price</td>
            <td>Total</td>
            <td>Amount</td>
            <td>Character</td>
            <td>Buy</td>
        </tr>
        <?php foreach($items as $item) : ?>
        <tr>
            <td>
                <a href="http://wotlk.openwow.com/item=<?php echo $item['id']; ?>"><?php echo $item["name"]; ?></a>
            </td>
            <td id="price">
                <?php echo $item["price"]; ?>
            </td>
            <td id="total">
                <?php echo $item["price"]; ?>
            </td>
            <td>
                <input type="number" name="amount" min="1" max="100" value="1">
            </td>
            <td>
                <select name="character">
                    <?php foreach($characters as $character) : ?>
                    <option value="<?php echo $character['name']; ?>"><?php echo $character['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td>
                <input type="hidden" name="item" value="<?php echo $item['id']; ?>">
                <button id="buy">Buy</button>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</section>
