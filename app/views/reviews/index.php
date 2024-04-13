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

            <div class="w-full des_and_rev_text space-y-5">
                <?php
                $countreply = new Review();
                $vote = new Vote();
                ?>

                <?php foreach ($data['allreviews'] as $review): ?>


                    <div class="w-full relative">

                        <div id="review_container_<?php echo $review['id'] ?> "
                            class="w-full space-y-4 border rounded-md px-5 py-3   review_containers">
                            <!-- primary review  -->
                            <div class="w-full mb-5">

                                <div class="w-full space-y-4 px-2 py-2">

                                    <div class="w-full flex justify-between items-center  space-x-2 ">
                                        <div class="flex justify-center items-center ">
                                            <div class="w-10 h-10 border bg-gray-400 rounded-full mr-2">
                                                <img src="" alt="">
                                            </div>
                                            <div>
                                                <span class="capitalize">
                                                    <?php echo $review['name'] ?>
                                                </span>

                                            </div>


                                            <!-- rating  -->
                                            <ul
                                                class="flex justify-start items-center ml-2 review_star_container_<?php echo $review['id'] ?>">
                                                <li class="flex items-center">

                                                    <div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="gray"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-5 h-5 text-gray-300 review_star_<?php echo $review['id'] ?>">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                                        </svg>
                                                    </div>



                                                </li>

                                                <li class="flex items-center">

                                                    <div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="gray"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-5 h-5 text-gray-300 review_star_<?php echo $review['id'] ?>">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                                        </svg>
                                                    </div>


                                                </li>
                                                <li class="flex items-center">

                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="gray" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="currentColor"
                                                        class="w-5 h-5 text-gray-300 review_star_<?php echo $review['id'] ?>">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                                    </svg>


                                                </li>
                                                <li class="flex items-center">

                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="gray" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="currentColor"
                                                        class="w-5 h-5 text-gray-300 review_star_<?php echo $review['id'] ?>">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                                    </svg>


                                                </li>
                                                <li class="flex items-center">

                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="gray" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="currentColor"
                                                        class="w-5 h-5 text-gray-300 review_star_<?php echo $review['id'] ?>">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                                    </svg>



                                                </li>

                                            </ul>


                                        </div>



                                        <!-- edit and delete  -->
                                        <div class="justify-self-end">
                                            <?php if ($_SESSION['user_id'] == $review['user_id']): ?>
                                                <div id="ed_del_btn_<?php echo $review['id']; ?>"
                                                    ed_del_btn="<?php echo $review['id']; ?>"
                                                    class="hover:bg-slate-100 p-1 rounded-full ed_del_btns">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                                    </svg>
                                                </div>

                                            <?php endif; ?>

                                            <!-- edit and delete  modal -->
                                            <div id="ed_del_modal_<?php echo $review['id']; ?>"
                                                class="absolute right-10 ed_del_modal hidden">
                                                <div class="w-24 bg-[#f4f4f4] border border-slate-100 rounded-md">
                                                    <ul class="rounded-md">
                                                        <li class="rounded-t-md cursor-pointer p-2 hover:bg-slate-300">
                                                            Edit
                                                        </li>
                                                        <li class="rounded-b-md cursor-pointer p-2 hover:bg-slate-300 delete_btn"
                                                            data-id="<?php echo $review['id']; ?>" data-id-name="id"
                                                            data-table="reviews">
                                                            Delete</li>
                                                    </ul>

                                                </div>
                                            </div>

                                        </div>




                                    </div>
                                    <div class="text-[10px] font-normal ml-12">
                                        <?php
                                        // $timestamp = strtotime($review['created_at']);
                                        // $formattedDate = date('d-M-Y h:m', $timestamp);
                                        // echo date('d-M-Y h:m', $review['created_at']);
                                        echo $review['created_at'];
                                        ?>
                                    </div>


                                    <div class="ml-12 flex justify-center items-center">

                                        <span id="content_<?php echo $review['id'] ?>" class="w-full">
                                            <?php echo strlen(substr($review['reviews'], 0, 60)) >= 60 ? substr($review['reviews'], 0, 70) . '.....' : substr($review['reviews'], 0, 70) ?>
                                        </span>


                                    </div>

                                </div>

                                <div class="text-sm flex justify-end items-center space-x-2 mt-3">



                                    <div class="flex justify-center items-center space-x-2">

                                        <!-- see more reply  -->
                                        <?php if ($countreply->countreply($review['id']) > 0): ?>
                                            <div id="" data-viewreplyid="<?php echo $review['id'] ?>"
                                                class="text-xs hover:cursor-pointer seemorereply">
                                                <span>See more reply</span>
                                            </div>

                                        <?php endif; ?>

                                        <!-- voting  -->
                                        <form action="" method="post" class="flex justify-center items-center">

                                            <div id="vote_" data-vote-id="<?php echo $review['id']; ?>"
                                                class="text-xs flex justify-center items-center hover:cursor-pointer voting_btns">

                                                <div class="flex justify-center items-center">
                                                    <?php if ($vote->checkvote($review['id'], "review_id")): ?>
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            fill="currentColor" class="w-4 h-4">
                                                            <path fill-rule="evenodd"
                                                                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    <?php else: ?>
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                            stroke-width="1.5" stroke="currentColor"
                                                            class="w-4 h-4 mr-1  text-gray-400 ">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                        </svg>
                                                    <?php endif; ?>

                                                </div>

                                                <button type="submit" name="primary_votebtn">

                                                    <span><?php echo $vote->countvote($review['id'], "review_id") ?></span>

                                                    <span>
                                                        <?php if ($vote->countvote($review['id'], "review_id") > 1): ?>
                                                            Votes
                                                        <?php else: ?>
                                                            Vote
                                                        <?php endif; ?>

                                                    </span>
                                                </button>


                                            </div>
                                            <input type="hidden" name="primary_voting_id"
                                                value="<?php echo $review['id'] ?>">
                                        </form>


                                        <!-- reply  -->
                                        <div class="text-xs flex justify-center items-center reply_btns hover:cursor-pointer"
                                            data-reply-id="<?php $review['id'] ?>"
                                            data-review-id="<?php echo $review['id'] ?>"
                                            data-item-id="<?php echo $data['singledata']['id'] ?>"
                                            data-username="<?php echo $review['name'] ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8.25 9.75h4.875a2.625 2.625 0 0 1 0 5.25H12M8.25 9.75 10.5 7.5M8.25 9.75 10.5 12m9-7.243V21.75l-3.75-1.5-3.75 1.5-3.75-1.5-3.75 1.5V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0c1.1.128 1.907 1.077 1.907 2.185Z" />
                                            </svg>
                                            <span>

                                                <span>
                                                    <?php
                                                    echo $countreply->countreply($review['id']);
                                                    ?>
                                                </span>
                                                <?php if ($countreply->countreply($review['id']) > 1): ?>
                                                    Replies
                                                <?php else: ?>
                                                    Reply
                                                <?php endif; ?>
                                            </span>

                                        </div>

                                    </div>

                                </div>
                            </div>





                            <!-- secondary reply  -->

                            <?php
                            foreach ($data['replyreviews'] as $replyreviews):
                                ?>
                                <?php
                                if ($replyreviews['review_id'] == $review['id']):
                                    ?>



                                    <div id="<?php echo $replyreviews['reviewreplyid'] ?>"
                                        data-reply-id="<?php echo $replyreviews['reply_id'] ?>"
                                        class="space-y-2 border rounded-md px-5 py-2 mb-5 mt-5 replies r_<?php echo $replyreviews['reply_id'] ?> hidden">

                                        <div>

                                            <div class="space-y-4">
                                                <div class="flex justify-between ">
                                                    <h1 class="text-sm font-medium">
                                                        <div class="flex justify-center items-center  space-x-2">
                                                            <div class="flex justify-center items-center">
                                                                <div class="w-10 h-10 border bg-gray-400 rounded-full mr-2">
                                                                    <img src="" alt="">
                                                                </div>
                                                                <span class="capitalize">
                                                                    <?php echo $replyreviews['name'] ?>
                                                                </span>


                                                            </div>
                                                            <div>
                                                                replies to
                                                            </div>
                                                            <div>
                                                                <span class="tousernameclass capitalize">
                                                                    <?php echo $replyreviews['touser_name'] ?>
                                                                </span>


                                                            </div>

                                                        </div>

                                                        <div class="text-[10px] font-normal ml-12">
                                                            <?php $timestamp = strtotime($replyreviews['created_at']);
                                                            $formattedDate = date('d-M-Y h:m:s', $timestamp);
                                                            echo $formattedDate;
                                                            ?>
                                                        </div>

                                                    </h1>



                                                    <div class="justify-self-end">
                                                        <?php if ($_SESSION['user_id'] == $replyreviews['replyuser_id']): ?>
                                                            <div id="ed_del_btn_<?php echo $replyreviews['reviewreplyid']; ?>"
                                                                ed_del_btn="<?php echo $replyreviews['reviewreplyid']; ?>"
                                                                class="hover:bg-slate-100 p-1 rounded-full ed_del_btns">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                                                </svg>
                                                            </div>

                                                        <?php endif; ?>

                                                        <!-- edit and delete  modal -->
                                                        <div id="ed_del_modal_<?php echo $replyreviews['reviewreplyid']; ?>"
                                                            class="absolute right-10 ed_del_modal hidden">
                                                            <div class="w-24 bg-[#f4f4f4] border border-slate-100 rounded-md">
                                                                <ul class="rounded-md">
                                                                    <li class="rounded-t-md cursor-pointer p-2 hover:bg-slate-300">
                                                                        Edit
                                                                    </li>
                                                                    <li class="rounded-b-md cursor-pointer p-2 hover:bg-slate-300 delete_btn"
                                                                        data-id="<?php echo $replyreviews['reviewreplyid']; ?>"
                                                                        data-id-name="reviewreplyid" data-table="review_reply">
                                                                        Delete</li>
                                                                </ul>

                                                            </div>
                                                        </div>

                                                    </div>


                                                </div>
                                                <div class="ml-12">
                                                    <?php echo $replyreviews['replies'] ?>

                                                </div>

                                            </div>

                                            <div class="text-sm flex justify-end items-center space-x-2 mt-3">
                                                <!-- see more reply  -->
                                                <span>
                                                    <?php if ($countreply->countreviewreply($replyreviews['reviewreplyid']) > 0): ?>
                                                        <div id="" data-viewreplyid="<?php echo $replyreviews['reviewreplyid'] ?>"
                                                            class="text-xs hover:cursor-pointer seemorereply">
                                                            <span>See more reply</span>
                                                        </div>
                                                    <?php endif; ?>
                                                </span>


                                                <!-- vote  -->
                                                <form action="" method="post" class="">

                                                    <div id="vote_" data-vote-id="<?php echo $replyreviews['reviewreplyid'] ?>"
                                                        class="text-xs flex justify-center items-center hover:cursor-pointer voting_btns">

                                                        <div>
                                                            <?php if ($vote->checkvote($replyreviews['reviewreplyid'], "review_reply_id")): ?>
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                    fill="currentColor" class="w-4 h-4">
                                                                    <path fill-rule="evenodd"
                                                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                                                        clip-rule="evenodd" />
                                                                </svg>
                                                            <?php else: ?>
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                                    stroke-width="1.5" stroke="currentColor"
                                                                    class="w-4 h-4 mr-1  text-gray-400 ">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                                </svg>
                                                            <?php endif; ?>
                                                        </div>

                                                        <button type="submit" name="review_reply_btn">
                                                            <span>
                                                                <?php if ($vote->countvote($replyreviews['reviewreplyid'], "review_reply_id") > 1): ?>
                                                                    Votes
                                                                <?php else: ?>
                                                                    Vote
                                                                <?php endif; ?>

                                                            </span>
                                                        </button>
                                                    </div>
                                                    <input type="hidden" name="review_reply_id"
                                                        value="<?php echo $replyreviews['reviewreplyid'] ?>">
                                                </form>

                                                <!-- reply  -->
                                                <div id="reply_btns_<?php echo $replyreviews['reviewreplyid'] ?>"
                                                    class="text-xs flex justify-center items-center"
                                                    data-reply-id="<?php echo $replyreviews['reviewreplyid']; ?>"
                                                    data-review-id="<?php echo $review['id'] ?>"
                                                    data-item-id="<?php echo $data['singledata']['id'] ?>"
                                                    data-username="<?php echo $replyreviews['name'] ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M8.25 9.75h4.875a2.625 2.625 0 0 1 0 5.25H12M8.25 9.75 10.5 7.5M8.25 9.75 10.5 12m9-7.243V21.75l-3.75-1.5-3.75 1.5-3.75-1.5-3.75 1.5V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0c1.1.128 1.907 1.077 1.907 2.185Z" />
                                                    </svg>
                                                    <span>

                                                        <span>
                                                            <?php
                                                            echo $countreply->countreviewreply($replyreviews['reviewreplyid']);
                                                            ?>
                                                        </span>
                                                        <?php if ($countreply->countreviewreply($replyreviews['reviewreplyid']) > 1): ?>
                                                            Replies
                                                        <?php else: ?>
                                                            Reply
                                                        <?php endif; ?>
                                                    </span>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <?php endif; ?>

                            <?php endforeach; ?>
                        </div>

                    </div>

                <?php endforeach; ?>
            </div>
        </div>

        <!-- pagination  -->
        <div class="py-10">
            <?php
            $newpagination = new Pagination();
            $newpagination->pagination($data);
            ?>

        </div>
    </div>
</section>


<!-- Delete modal  -->
<div id="deletemodal" class="w-full h-auto hidden">
    <div
        class="w-full h-screen flex justify-center items-center bg-[linear-gradient(rgba(0,0,0,.8),rgba(0,0,0,.8))]   overflow-x-auto  fixed left-0 top-0 z-20 md:p-20">
        <div
            class="w-[350px]  bg-stone-100  shadow-lg rounded-md border flex flex-col justify-center items-center py-5 px-10">

            <div class="w-full flex justify">
                <div>
                    <i class="fa-regular fa-circle-xmark text-lg text-red-500"></i>
                </div>
            </div>

            <div class="flex justify-between items-center space-x-10 mt-3">


                <div class="delte_text">
                    <div class="w-full text-lg ">
                        <span>Are you sure to delete?.</span>

                    </div>


                </div>
            </div>


            <div class="w-full flex justify-end items-center mt-10 space-x-2">
                <button
                    class="bg-slate-200 hover:bg-slate-300 transition-all duration-300 rounded-md px-3 py-2 cancledelete"
                    onclick="document.getElementById('deletemodal').classList.toggle('hidden')">Cancle</button>
                <form action="<?php echo URLROOT; ?>/allfragrance/destroy/<?php echo $review['item_id'] ?>"
                    method="POST">

                    <button type="submit" name="deletemodal_btn"
                        class="bg-red-500 rounded-md hover:opacity-90 px-3 py-2 deletemodal_btn">Delete</button>
                    <input type="hidden" name="delete_id" id="deletemodal_input" value="">
                    <input type="hidden" name="datatable" id="datatable" value="">
                    <input type="hidden" name="data_id_name" id="data_id_name" value="">

                </form>

            </div>

        </div>
    </div>




</div>



<?php
require_once ('/opt/lampp/htdocs/mvcshop/app/views/reviews/reviewsjs.php');
?>