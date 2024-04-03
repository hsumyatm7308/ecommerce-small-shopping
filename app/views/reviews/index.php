<!-- Description and review  -->
<section>
    <div class="w-full mt-5 ">
        <div class="flex font-medium space-x-4">
            <h3 class="text-xl flex items-center p-2 mb-5 border-2 border-b-transparent   des_and_rev">
                <span class="uppercase text-sm">Description</span>
            </h3>


            <h3 class="text-xl flex items-center p-2 mb-5 des_and_rev">
                <span class="uppercase text-sm">Review</span>
            </h3>

        </div>


        <div class="w-full flex pb-10 mt-5">

            <div id="" class="des_and_rev_text hidden">
                <?php echo $data['singledata']['description'] ?>
            </div>

            <div class="w-full grid grid-cols-2 gap-x-20 gap-y-10 des_and_rev_text ">

                <?php foreach ($data['allreviews'] as $review): ?>


                    <div class="space-y-4 border rounded-md px-5 py-3">
                        <!-- primary review  -->
                        <div class="mb-5">
                            <div class="flex justify-between items-center mb-3">
                                <ul class="flex justify-start items-center">
                                    <li class="flex items-center">

                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-yellow-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                            </svg>
                                        </div>



                                    </li>

                                    <li class="flex items-center">

                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-yellow-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                            </svg>
                                        </div>


                                    </li>
                                    <li class="flex items-center">

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-yellow-500">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                        </svg>


                                    </li>
                                    <li class="flex items-center">

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-yellow-500">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                        </svg>


                                    </li>
                                    <li class="flex items-center">

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-yellow-500">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                        </svg>



                                    </li>

                                </ul>

                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                    </svg>

                                </div>
                            </div>
                            <div class="space-y-4">
                                <h1 class="text-lg font-medium">
                                    <?php echo $review['name']; ?>
                                    <div class="text-xs font-normal">
                                        <?php $timestamp = strtotime($review['created_at']);
                                        $formattedDate = date('d-M-Y', $timestamp);
                                        echo $formattedDate;
                                        ?>
                                    </div>
                                </h1>
                                <div>
                                    <?php echo $review['reviews'] ?>

                                </div>

                            </div>

                            <div class="text-sm flex justify-end items-center space-x-2 mt-3">
                                <div class="text-xs flex justify-center items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                    </svg>
                                    <span>Vote</span>

                                </div>

                                <div class="text-xs flex justify-center items-center reply_btns"
                                    data-reply-id="<?php echo $replyreviews['reviewreplyid']; ?>"
                                    data-review-id="<?php echo $review['id'] ?>"
                                    data-item-id="<?php echo $data['singledata']['id'] ?>"
                                    data-username="<?php echo $review['name'] ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 9.75h4.875a2.625 2.625 0 0 1 0 5.25H12M8.25 9.75 10.5 7.5M8.25 9.75 10.5 12m9-7.243V21.75l-3.75-1.5-3.75 1.5-3.75-1.5-3.75 1.5V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0c1.1.128 1.907 1.077 1.907 2.185Z" />
                                    </svg>
                                    <span>Reply</span>
                                </div>

                            </div>
                        </div>


                        <!-- Reply review  -->
                        <!-- <div class="space-y-2 border rounded-md px-5 py-2 mb-5 mt-5">
                            <div>
                                <div class="flex justify-between items-center mb-3">

                                    <div>

                                    </div>
                                </div>
                                <div class="space-y-4">
                                    <div class="flex justify-between ">
                                        <h1 class="text-sm font-medium">

                                            <span>
                                                <?php echo $review['name']; ?>
                                            </span>
                                            from
                                            <?php echo $data['user']['name'] ?>

                                            <div class="text-[12px] font-normal">
                                                <?php $timestamp = strtotime($review['created_at']);
                                                $formattedDate = date('d-M-Y', $timestamp);
                                                echo $formattedDate;
                                                ?>
                                            </div>
                                        </h1>

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                        </svg>

                                    </div>
                                    <div>
                                        <?php echo $review['reviews'] ?>

                                    </div>

                                </div>

                                <div class="text-sm flex justify-end items-center space-x-2 mt-3">
                                    <div class="text-xs flex justify-center items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                        </svg>
                                        <span>Vote</span>

                                    </div>

                                    <div class="text-xs flex justify-center items-center reply_btns"
                                        data-reply-id="<?php echo $review['id']; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.25 9.75h4.875a2.625 2.625 0 0 1 0 5.25H12M8.25 9.75 10.5 7.5M8.25 9.75 10.5 12m9-7.243V21.75l-3.75-1.5-3.75 1.5-3.75-1.5-3.75 1.5V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0c1.1.128 1.907 1.077 1.907 2.185Z" />
                                        </svg>
                                        <span>Reply</span>
                                    </div>

                                </div>

                            </div>


                            <div class="space-y-2 border rounded-md px-5 py-2 mb-5 mt-5">
                                <div>
                                    <div class="flex justify-between items-center mb-3">

                                        <div>

                                        </div>
                                    </div>
                                    <div class="space-y-4">
                                        <div class="flex justify-between ">
                                            <h1 class="text-lg font-medium">
                                                <?php echo $data['user']['name']; ?>
                                                <div class="text-[12px] font-normal">
                                                    <?php $timestamp = strtotime($review['created_at']);
                                                    $formattedDate = date('d-M-Y', $timestamp);
                                                    echo $formattedDate;
                                                    ?>
                                                </div>
                                            </h1>

                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                            </svg>

                                        </div>
                                        <div>
                                            <?php echo $review['reviews'] ?>

                                        </div>

                                    </div>

                                    <div class="text-sm flex justify-end items-center space-x-2 mt-3">
                                        <div class="text-xs flex justify-center items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                            </svg>
                                            <span>Vote</span>

                                        </div>

                                        <div class="text-xs flex justify-center items-center reply_btns"
                                            data-reply-id="<?php echo $review['id']; ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 9.75h4.875a2.625 2.625 0 0 1 0 5.25H12M8.25 9.75 10.5 7.5M8.25 9.75 10.5 12m9-7.243V21.75l-3.75-1.5-3.75 1.5-3.75-1.5-3.75 1.5V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0c1.1.128 1.907 1.077 1.907 2.185Z" />
                                            </svg>
                                            <span>Reply</span>
                                        </div>

                                    </div>

                                </div>


                            </div>

                        </div> -->

                        <?php foreach ($data['replyreviews'] as $replyreviews): ?>
                            <?php if ($replyreviews['review_id'] == $review['id']): ?>

                                <div class="space-y-2 border rounded-md px-5 py-2 mb-5 mt-5">
                                    <div>
                                        <div class="flex justify-between items-center mb-3">

                                            <div>

                                            </div>
                                        </div>
                                        <div class="space-y-4">
                                            <div class="flex justify-between ">
                                                <h1 class="text-lg font-medium">
                                                    <span class="tousernameclass">
                                                        <?php echo $replyreviews['touser_name'] ?>
                                                    </span>
                                                    by
                                                    <?php echo $replyreviews['name'] ?>
                                                    <div class="text-[12px] font-normal">
                                                        <?php $timestamp = strtotime($review['created_at']);
                                                        $formattedDate = date('d-M-Y h:m:s', $timestamp);
                                                        echo $formattedDate;
                                                        ?>
                                                    </div>
                                                </h1>

                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                                </svg>

                                            </div>
                                            <div>
                                                <?php echo $replyreviews['replies'] ?>

                                            </div>

                                        </div>

                                        <div class="text-sm flex justify-end items-center space-x-2 mt-3">
                                            <div class="text-xs flex justify-center items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                </svg>
                                                <span>Vote</span>

                                            </div>

                                            <div class="text-xs flex justify-center items-center reply_btns"
                                                data-reply-id="<?php echo $replyreviews['reviewreplyid']; ?>"
                                                data-review-id="<?php echo $review['id'] ?>"
                                                data-item-id="<?php echo $data['singledata']['id'] ?>"
                                                data-username="<?php echo $replyreviews['name'] ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M8.25 9.75h4.875a2.625 2.625 0 0 1 0 5.25H12M8.25 9.75 10.5 7.5M8.25 9.75 10.5 12m9-7.243V21.75l-3.75-1.5-3.75 1.5-3.75-1.5-3.75 1.5V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0c1.1.128 1.907 1.077 1.907 2.185Z" />
                                                </svg>
                                                <span>Reply</span>
                                            </div>
                                        </div>

                                    </div>


                                </div>

                            <?php endif; ?>



                        <?php endforeach; ?>
                        <div>
                            <span>load more</span>
                        </div>
                    </div>



                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>


<!-- modal  -->
<section id="replymodal" class="w-full h-screen fixed top-0 left-0 hidden">
    <div id="modaldialog"
        class="w-full h-full bg-[linear-gradient(rgba(0,0,0,.5),rgba(0,0,0,.5))] flex justify-center items-center  absolute inset-0 modalcontainer">
        <div class="w-[500px] h-[300px] bg-stone-200 modal">
            <div id="crossx" onclick="document.getElementById('replymodal').classList.toggle('hidden')"
                class="w-full flex justify-end items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 text-gray-600 mr-5 mt-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>

            </div>
            <div class="w-full modal-body">
                <div class="w-full">
                    <form action="" method="post" class="w-full">


                        <div class="w-full flex justify-center items-center flex-col ">

                            <span id="tousername"></span>
                            from
                            <?php echo $data['user']['name'] ?>

                            <input type="hidden" name="replyusername" id="replyusername" class="w-[90%] mb-3 p-3"
                                value="<?php echo $data['user']['name'] ?>" placeholder="Enter your name">
                            <textarea name="replytext" id="replytext" class="w-[90%] p-2" cols="30" rows=""
                                placeholder="Type review here"></textarea>
                        </div>

                        <div class="w-full flex justify-center items-center mt-3">
                            <button type="submit" name="replybtn" class="w-[90%] bg-gray-400 p-2"
                                id="submitreview">Submit</button>
                        </div>

                        <input type="text" name="reply_id" id="reply_id" value="">
                        <input type="text" name="review_id" id="review_id" value="">
                        <input type="text" name="item_id" id="item_id" value="">
                        <input type="text" name="touser_name" id="touser_name" value="">
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>


<script>
    // reply  
    const reply_btns = document.querySelectorAll('.reply_btns');
    const replymodal = document.getElementById('replymodal');
    const reply_id = document.getElementById('reply_id');
    const review_id = document.getElementById('review_id');
    const item_id = document.getElementById('item_id');
    const tousernamemodal = document.getElementById('tousername');
    const touser_name = document.getElementById('touser_name');
    const tousernameclass = document.querySelector('.tousernameclass');

    reply_btns.forEach((ele, idx) => {
        ele.addEventListener('click', function () {
            const replyid = ele.getAttribute('data-reply-id');
            const reviewid = ele.getAttribute('data-review-id');
            const itemid = ele.getAttribute('data-item-id');
            const username = ele.getAttribute('data-username');


            replymodal.setAttribute('data-review-id', reviewid);
            replymodal.setAttribute('data-item-id', itemid);


            replymodal.classList.toggle('hidden');
            reply_id.setAttribute('value', replyid)
            review_id.setAttribute('value', reviewid)
            item_id.setAttribute('value', itemid)
            touser_name.setAttribute('value', username)

            console.log(touser_name);

            tousernamemodal.innerText = username
        })
    })
</script>