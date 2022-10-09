<?php include('header.php') ?>

<section id="list" class="list">
    <header class="list__row list__header">
        <h1>Assignments</h1>
        <form action="." method="get" id="list__header_select" class="list__header_select">
            <input type="hidden" name="action" value="list_assignments">
            <select name="course_id" required>
                <option value="0">View all</option>
                <?php foreach($courses as $course){ ?>
                    <?php if ($course_id == $course['course_id']){?>
                        <option value="<?php echo $course['course_id'] ?>" selected>
                    <?php } else { ?>
                        <option value="<?php echo $course['course_id'] ?>">                        
                    <?php } ?>
                        <?php echo $course['course_name'] ?>
                        </option>
                <?php } ?>
            </select>
            <button class="add_button bold">Go</button>
        </form>
    </header>
    <?php if($assignments){ ?>
        <?php foreach($assignments as $assignment){ ?>
            <div class="list__row">
                <div class="list__item">
                    <p class="bold"><?php echo $assignment['course_name'] ?></p>
                    <p><?php echo $assignment['assignment_description'] ?></p>
                </div>
                <div class="list__remove_item">
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_assignment">
                        <input type="hidden" name="assignment_id" value="<?php echo $assignment['assignment_id'] ?>">
                        <button class="remove_button">❌</button>
                    </form>
                </div>
            </div>
        <?php } ?>
    <?php } else if ($course_id) { ?>
        <br>
        <p>No assignments exist for this course yet.</p>
    <?php } else { ?>
        <br>
        <p>No assignments exist yet.</p>
    <?php } ?>
</section>

<section id="add" class="add">
    <h2>Add assignment</h2>
    <form action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="action" value="add_assignment">
        <div class="add__inputs">
            <label>course:</label>
            <select name="course_id" required>
                <option>Please select</option>
                <?php foreach($courses as $course){ ?>
                    <option value="<?php echo $course['course_id'] ?>"><?php echo $course['course_name'] ?></option>
                <?php } ?>
            </select>
            <label>description:</label>
            <input type="text" name="assignment_description" maxlength="50" placeholder="description" required>
        </div>
        <div class="add__add_item">
            <button class="add_button bold">Add</button>
        </div>
    </form>
</section>

<p><a href=".?action=list_courses">View &amp; edit courses</a></p>

<?php include('footer.php') ?>