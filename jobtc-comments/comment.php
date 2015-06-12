<ol class="comments">
    <?php
    //Get function to populate the list
    dashboard_comments();

    if ($count > 0) {

        foreach ($comments as $comment) {
            ?>
            <li>
                <div class="comment_container">
                    <div class="avatar-container">
                        <img src="//0.gravatar.com/avatar/a06c1e7cdc988bded1c9a78619cde357?s=48&amp;d=http%3A%2F%2F0.gravatar.com%2Favatar%2Fad516503a11cd5ca435acc9bb6523536%3Fs%3D48&amp;r=G" width="48" height="48" alt="" class="avatar avatar-48 wp-user-avatar wp-user-avatar-48 photo avatar-default">
                        <div class="comment-text">
                            <p>need to be able to create a short url for jobs ..... created after the job is submitted</p>
                            <text>
                            <span class="comment-author-link"><text>By:</text> <strong>tom </strong>&nbsp;Regarding:</span>
                            <a href="http://vidhire.net/resumes/4685544fae4564f5b/#comment-120">Roy Al Pane</a>
                            </text>     
                        </div>
                    </div>
                </div>
                <div class="actions">
                    <a class="reply" href="#">Reply</a>
                    <a class="delete" href="#">Delete</a>
                </div>
                <br>
            </li>
            <?php
        } //End Resume List Loop
    } else {
        ?>
        <li class="comment">There are no comments available</li>
        <?php } ?>
</ol>