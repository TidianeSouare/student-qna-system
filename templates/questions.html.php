<?php if (!empty($_SESSION['flash_error'])): ?>
    <div style="background:#ffdddd; color:#a00; padding:10px; margin-bottom:10px; border-left:5px solid #a00;">
        <?= htmlspecialchars($_SESSION['flash_error']); ?>
    </div>
    <?php unset($_SESSION['flash_error']); ?>
<?php endif; ?>

<?php if (!empty($_SESSION['flash_success'])): ?>
    <div style="background:#ddffdd; color:#0a0; padding:10px; margin-bottom:10px; border-left:5px solid #0a0;">
        <?= htmlspecialchars($_SESSION['flash_success']); ?>
    </div>
    <?php unset($_SESSION['flash_success']); ?>
<?php endif; ?>

<h2>All Student Questions</h2>

<?php if (empty($questions)): ?>
    <p>No questions found.</p>
<?php else: ?>
    <?php foreach ($questions as $q): ?>
        <div style="border:1px solid #ddd; padding:12px; margin-bottom:16px; border-radius:6px;">
            
            
            <p><strong>Question:</strong></p>
            <p><?= nl2br(htmlspecialchars($q['questiontext'], ENT_QUOTES, 'UTF-8')); ?></p>

            
            <p style="font-size:0.9em; color:#555;">
                <em>Posted on:</em> <?= htmlspecialchars($q['questiondate'], ENT_QUOTES, 'UTF-8'); ?>
                <?php if (!empty($q['author'])): ?>
                    &nbsp; | &nbsp; <strong>Author:</strong> <?= htmlspecialchars($q['author'], ENT_QUOTES, 'UTF-8'); ?>
                <?php endif; ?>
                <?php if (!empty($q['module'])): ?>
                    &nbsp; | &nbsp; <strong>Module:</strong> <?= htmlspecialchars($q['module'], ENT_QUOTES, 'UTF-8'); ?>
                <?php endif; ?>
            </p>

            
            <?php if (!empty($q['image'])): ?>
                <img src="<?= htmlspecialchars($q['image'], ENT_QUOTES, 'UTF-8'); ?>" 
                     alt="Question Image"
                     style="max-width:360px; border:1px solid #ccc; margin-top:10px;">
            <?php endif; ?>

            
            <div style="margin-top:10px;">
                <?php
                $isAdmin = (isset($_SESSION['role']) && $_SESSION['role'] === 'admin');
                $currentUserId = $_SESSION['user_id'] ?? null;
                if ($isAdmin || $currentUserId == $q['user_id']): ?>
                    <a href="editquestion.php?id=<?= $q['id']; ?>">Edit</a> |
                    <a href="deletequestion.php?id=<?= $q['id']; ?>"
                       onclick="return confirm('Are you sure you want to delete this question?');">Delete</a>
                <?php endif; ?>
            </div>

            
            <div style="margin-top:20px; padding:10px; background:#f9f9f9; border-radius:6px;">
                <h4>Answers:</h4>

                <?php if (empty($q['answers'])): ?>
                    <p>No answers yet. Be the first to respond.</p>
                <?php else: ?>
                    <?php foreach ($q['answers'] as $ans): ?>
                        <div style="border:1px solid #eee; padding:8px; margin-bottom:10px; border-radius:6px;">
                            
                            <p><?= nl2br(htmlspecialchars($ans['answer_text'], ENT_QUOTES, 'UTF-8')); ?></p>

                            <p style="font-size:0.85em; color:#666;">
                                <em>Answered on:</em> <?= htmlspecialchars($ans['answer_date']); ?>
                                <?php if (!empty($ans['answer_author'])): ?>
                                    &nbsp; | &nbsp; <strong>By:</strong> <?= htmlspecialchars($ans['answer_author']); ?>
                                <?php endif; ?>
                            </p>
                            
                            <!-- Edit/Delete Answer -->
                            <?php if ($isAdmin || $currentUserId == $ans['user_id']): ?>
                                <a href="edit_answer.php?id=<?= $ans['id']; ?>">Edit</a> |
                                <a href="delete_answer.php?id=<?= $ans['id']; ?>"
                                   onclick="return confirm('Delete this answer?');">Delete</a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                
                <?php if (isset($_SESSION['user_id'])): ?>
                    <form action="submit_answer.php" method="POST" style="margin-top:10px;">
                        <input type="hidden" name="question_id" value="<?= $q['id']; ?>">

                        <textarea name="answer_text" required
                                  placeholder="Write your answer here..."
                                  style="width:100%; height:80px; padding:8px;"></textarea>

                        <button type="submit" 
                                style="margin-top:6px; padding:6px 12px;">Submit Answer</button>
                    </form>
                <?php else: ?>
                    <p style="color:#c00; font-style:italic;">Log in to answer this question.</p>
                <?php endif; ?>
            </div>

        </div>
    <?php endforeach; ?>
<?php endif; ?>
