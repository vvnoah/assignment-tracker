<?php include('header.php') ?>

<section id="list" class="list">
    <header class="list__row list__header">
        <h1>Courses</h1>
    </header>
    <?php if($courses){ ?>
        <?php foreach($courses as $course){ ?>
            <div class="list__row">
                <div class="list__item">
                    <p><?php echo $course['course_name'] ?></p>
                </div>
                <div class="list__remove_item">
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_course">
                        <input type="hidden" name="course_id" value="<?php echo $course['course_id'] ?>">
                        <button class="remove_button">❌</button>
                    </form>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>
    <br>
    <p>No courses exist yet.</p>
    <br>
    <?php } ?>
</section>
   
<section id="add" class="add">
    <h2>Add course</h2>
    <form action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="action" value="add_course">
        <div class="add__inputs">
            <label>name:</label>
            <input type="text" name="course_name" maxlength="50" placeholder="name" required>
        </div>
        <div class="add__add_item">
            <button class="add_button bold">Add</button>
        </div>
    </form>
</section>
<br>
<p><a href=".">View &amp; add assignments</a></p>
    
<?php include('footer.php') ?>
