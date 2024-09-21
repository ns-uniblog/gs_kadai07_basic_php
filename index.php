<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>オーダー表</h1>
    <form action="write.php" method="post">
    <div>
        <label>名前</label>
        <input type="text" name="name" placeholder="サンプル太郎">
    </div>
    <div>
        <label>Email</label>
        <input type="text" name="email" placeholder="sample-taro@gmail.com">
    </div>
    <div>
        <label>パスタ🍝600円</label>
        <input type="number" step="1" min="0" placeholder="0" name="order_pasta">
    </div>
    <div>
        <label>ピザ🍕700円</label>
        <input type="number" step="1" min="0" placeholder="0" name="order_pizza">
    </div>
    <div>
        <label>カレー🍛800円</label>
        <input type="number" step="1" min="0" placeholder="0" name="order_curry">
    </div>
    <div>
        <label>備考</label>
        <textarea name="memo" rows="1" placeholder="ご要望があればご記入ください！"></textarea>
    </div>
    <button type="submit">送信</button>
</form>

    <br> <br>
    <h1>送信履歴</h1>
    <table border="1">
        <tr>
            <th>日時</th>
            <th>名前</th>
            <th>Email</th>
            <th>パスタ🍝600円</th>
            <th>ピザ🍕700円</th>
            <th>カレー🍛800円</th>
            <th>合計金額</th>
            <th>備考</th>
        </tr>
        <?php
        include 'read.php';
        $orders = readOrders();
        $totalPasta = $totalPizza = $totalCurry = $totalAmount = 0;

        foreach ($orders as $order) {
            $pastaPrice = 600;
            $pizzaPrice = 700;
            $curryPrice = 800;

            $pastaCount = (int)$order[3];
            $pizzaCount = (int)$order[4];
            $curryCount = (int)$order[5];

            $total = ($pastaCount * $pastaPrice) + ($pizzaCount * $pizzaPrice) + ($curryCount * $curryPrice);
            
            $totalPasta += $pastaCount;
            $totalPizza += $pizzaCount;
            $totalCurry += $curryCount;
            $totalAmount += $total;

            echo '<tr>';
            echo '<td>' . htmlspecialchars($order[0]) . '</td>'; // 日時
            echo '<td>' . htmlspecialchars($order[1]) . '</td>'; // 名前
            echo '<td>' . htmlspecialchars($order[2]) . '</td>'; // Email
            echo '<td>' . htmlspecialchars($order[3]) . '</td>'; // パスタ
            echo '<td>' . htmlspecialchars($order[4]) . '</td>'; // ピザ
            echo '<td>' . htmlspecialchars($order[5]) . '</td>'; // カレー
            echo '<td>' . htmlspecialchars($total) . '円</td>'; // 合計金額
            echo '<td>' . htmlspecialchars($order[6]) . '</td>'; // 備考
            echo '</tr>';
        }
        ?>
        <tr>
            <th colspan="3">合計</th>
            <td><?php echo htmlspecialchars($totalPasta); ?></td>
            <td><?php echo htmlspecialchars($totalPizza); ?></td>
            <td><?php echo htmlspecialchars($totalCurry); ?></td>
            <td><?php echo htmlspecialchars($totalAmount); ?>円</td>
            <td></td>
        </tr>
    </table>
    <form action="clear.php" method="post">
            <button type="submit">送信履歴を消去</button>
        </form>
</body>
</html>
