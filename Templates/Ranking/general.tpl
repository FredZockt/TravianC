<?php
   $tribe1 = mysqli_query($database->connection, "SELECT SQL_CACHE * FROM ".TB_PREFIX."users WHERE tribe = 1 and id>4");
   $tribe2 = mysqli_query($database->connection, "SELECT SQL_CACHE * FROM ".TB_PREFIX."users WHERE tribe = 2 and id>4");
   $tribe3 = mysqli_query($database->connection, "SELECT SQL_CACHE * FROM ".TB_PREFIX."users WHERE tribe = 3 and id>4");
   $tribes = array(mysqli_num_rows($tribe1), mysqli_num_rows($tribe2), mysqli_num_rows($tribe3));
   $users = mysqli_num_rows(mysqli_query($database->connection, "SELECT SQL_CACHE * FROM ".TB_PREFIX."users WHERE id>4")); ?>

<h4 class="round">Stats</h4>
<table cellpadding="1" cellspacing="1" id="world_player" class="transparent">
     <tbody>
     <tr>
      <th>Registered players</th>
      <td><?php echo $users; ?></td>
     </tr>
     <tr>
      <th>Active players</th>
      <td><?php
                   $active = mysqli_num_rows(mysqli_query($database->connection, "SELECT * FROM ".TB_PREFIX."users WHERE ".time()."-timestamp < (3600*24)"));
                   echo $active; ?></td>
     </tr>     <tr>
      <th>Players online</th>
      <td><?php
				$result = mysqli_query($database->connection, "SELECT * FROM ".TB_PREFIX."online");
				$num_rows = mysqli_num_rows($result);
				echo $num_rows;
				?></td>
     </tr>
    </tbody>
   </table>
<h4 class="round spacer">Tribes</h4>
<table cellpadding="1" cellspacing="1" id="world_tribes" class="world">
    <thead>
     <tr class="hover">
      <td>Tribe</td>
      <td>Registered</td>
      <td>Percent</td>
     </tr>
     </thead>
     <tbody>
     <tr class="hover">
      <td>Romans</td>
      <td><?php echo $tribes[0]; ?></td>
      <td><?php
$percents = 100*($tribes[0] / $users);
echo $percents = intval ($percents);
echo "%"; ?></td>
     </tr>
     <tr class="hover">
      <td>Teutons</td>
      <td><?php echo $tribes[1]; ?></td>
      <td><?php
$percents = 100*($tribes[1] / $users);
echo $percents = intval ($percents);
echo "%"; ?></td>
     </tr>
     <tr class="hover">
      <td>Gauls</td>
      <td><?php echo $tribes[2]; ?></td>
      <td><?php
$percents = 100*($tribes[2] / $users);
echo $percents = intval ($percents);
echo "%"; ?></td>
     </tr>
    </tbody>
   </table>

   <h4 class="round spacer">Miscellaneous</h4>
    <table cellpadding="1" cellspacing="1" id="world_tribes" class="world">
    <thead>
     <tr class="hover">
      <td>Attacks</td>
      <td>Casualties</td>
      <td>Date</td>
     </tr>
     </thead>
        <tbody>
            <tr class="hover">
                <td><?php echo $database->getAttackByDate(time()); ?></td>

                <td><?php echo $database->getAttackCasualties(time()); ?></td>

                <td><?php echo date("j. M"); ?></td>
            </tr>
			
            <tr class="hover">
                <td><?php echo $database->getAttackByDate(time()-(86400*1)); ?></td>

                <td><?php echo $database->getAttackCasualties(time()-(86400*1)); ?></td>

                <td><?php echo date("j. M",time()-(86400*1)); ?></td>
            </tr>

            <tr class="hover">
                <td><?php echo $database->getAttackByDate(time()-(86400*2)); ?></td>

                <td><?php echo $database->getAttackCasualties(time()-(86400*2)); ?></td>

                <td><?php echo date("j. M",time()-(86400*2)); ?></td>
            </tr>

            <tr class="hover">
                <td><?php echo $database->getAttackByDate(time()-(86400*3)); ?></td>

                <td><?php echo $database->getAttackCasualties(time()-(86400*3)); ?></td>

                <td><?php echo date("j. M",time()-(86400*3)); ?></td>
            </tr>
            <tr class="hover">
                <td><?php echo $database->getAttackByDate(time()-(86400*4)); ?></td>

                <td><?php echo $database->getAttackCasualties(time()-(86400*4)); ?></td>

                <td><?php echo date("j. M",time()-(86400*4)); ?></td>
            </tr>

            <tr class="hover">
                <td><?php echo $database->getAttackByDate(time()-(86400*5)); ?></td>

                <td><?php echo $database->getAttackCasualties(time()-(86400*5)); ?></td>

                <td><?php echo date("j. M",time()-(86400*5)); ?></td>
            </tr>

            <tr class="hover">
                <td><?php echo $database->getAttackByDate(time()-(86400*6)); ?></td>

                <td><?php echo $database->getAttackCasualties(time()-(86400*6)); ?></td>

                <td><?php echo date("j. M",time()-(86400*6)); ?></td>
            </tr>
        </tbody>
    </table>