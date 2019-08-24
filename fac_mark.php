<?php
  include 'webpage_header.php';
  include 'connection.php';
?>
SELECT * FROM submission INNER JOIN student ON student.reg_no = submission.reg_no INNER JOIN title ON title.reg_no=submission.reg_no INNER JOIN minor_guide ON minor_guide.reg_no=submission.reg_no where sem_id='4' order by student.reg_no
<?php
  include 'webpage_footer.php';
?>