<ol>
    <?php
    foreach ($Ticket as $Ticket) {
        $login = $Ticket->user['login'] ?? 'Юзер удален';
        echo '<div class="bg-gray-400 rounded-lg text-white p-1 m-2">';
        echo "<p>$login</p><br>";
        echo "<p>Описание: $Ticket[description]</p> <br>";
        echo "</div>";
    }
    ?>
</ol>   