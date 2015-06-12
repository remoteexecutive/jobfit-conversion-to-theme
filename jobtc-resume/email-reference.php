<div class="reference-dialog">
    <div>
        <label for="email-address">To:</label>
        <input type="text" name="email-address" class="email-address" value="" />
        <br />
        <label for="email-from">From:</label>
        <input type="text" name="email-from" class="email-from" value="Vidhire Human Resources ref@vidhire.net" />
        <br />
        <label for="email-subject">Subject:</label>
        <input type="text" name="email-subject" class="email-subject" value="Regarding Evaluation of Roy Al Pane ?>" />
        <br />
        <br />
        <div class="mail-content" contenteditable="true">
            Dear <text class='reference-name'></text>,<br />
            We are in process of assessing your past employee Roy Al Pane for a position with company.
            On a scale of 1 – 5, how would you rate past performance? <br /><br />

            <strong>Rating: (1) poor (2) fair (3) good (4) very good (5) excellent</strong>
            <br /><br />

            <form action='process.php' method='post' target='_blank'>

                <table>
                    <tr>
                        <td><strong>Productivity</strong></td>
                        <td><select name='performance'><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select></td>
                    </tr>
                    <tr>
                        <td><strong>Attitude</strong></td>
                        <td><select name='attitude'><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select></td>
                    </tr>
                    <tr>
                        <td><strong>Dependability</strong></td>
                        <td><select name='depend'><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select></td>
                    </tr>
                    <tr>
                        <td><strong>Team Player</strong></td>
                        <td><select name='team_player'><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select></td>
                    </tr>
                    <tr>
                        <td><strong>Learning Speed</strong></td>
                        <td><select name='learning_speed'><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select></td>
                    </tr>
                    <tr>
                        <td><strong>Flexibility</strong></td>
                        <td><select name='flexibility'><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select></td>
                    </tr>
                    <tr>
                        <td><strong>Creativity</strong></td>
                        <td><select name='creativity'><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option></select></td>
                    </tr>
                </table>
                <input name='resume_id'  value='<?php echo $post->ID; ?>' type='hidden' />
                <input class='reference-name' name='reference_name' value='' type='hidden' />
                <br />
                <input type='submit' value='Submit Review' /></form><br />
            Note: Your assessment is confidential.  If you cannot see the pull down menu, please use this link.<br /> Vidhire.net is a free hiring system. <br />
            <br />Thank you.
        </div>
        <br />
        <input class="reference-resume-id" name="resume_id" type="hidden" value="57" />
        <input class="reference-name" name="reference_name" type="hidden" value="" />
    </div>
</div>