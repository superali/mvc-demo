<DOCTYPE html>
<html>
 <h1>welcome</h1>
<p> Heloo <?php echo htmlspecialchars($username); ?></p>
<ul>
    <?php foreach($friends as $friend): ?>
        <li><?php echo htmlspecialchars($friend); ?></li>
    <?php endforeach; ?>
    </ul>    
</html>

