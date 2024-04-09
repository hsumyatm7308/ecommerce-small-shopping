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
                <?php $countreply = new Review(); ?>

                <?php foreach ($data['allreviews'] as $review): ?>


                    <div>

                        <div id="review_container_<?php echo $review['id'] ?> "
                            class=" space-y-4 border rounded-md px-5 py-3   review_containers">
                            <!-- primary review  -->
                            <div class="mb-5">
                                <div class="flex justify-between items-center mb-3">
                                    <ul class="flex justify-start items-center">
                                        <li class="flex items-center">

                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor"
                                                    class="w-5 h-5 text-yellow-500">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                                </svg>
                                            </div>



                                        </li>

                                        <li class="flex items-center">

                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor"
                                                    class="w-5 h-5 text-yellow-500">
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
                                    <div>

                                    </div>
                                    <h1 class="text-sm font-medium">

                                        <div class="flex justify-start items-center  space-x-2">
                                            <div class="flex justify-center items-center">
                                                <div class="w-10 h-10 border bg-gray-400 rounded-full mr-2">
                                                    <img src="" alt="">
                                                </div>
                                                <span class="capitalize">
                                                    <?php echo $review['name'] ?>
                                                </span>


                                            </div>



                                        </div>
                                        <div class="text-[10px] font-normal ml-12">
                                            <?php $timestamp = strtotime($review['created_at']);
                                            $formattedDate = date('d-M-Y h:m:s', $timestamp);
                                            echo $formattedDate;
                                            ?>
                                        </div>

                                    </h1>
                                    <div class="ml-12 flex justify-center items-center">

                                        <span id="content_<?php echo $review['id'] ?>" class="w-full">
                                            <?php echo strlen(substr($review['reviews'], 0, 60)) >= 60 ? substr($review['reviews'], 0, 70) . '.....' : substr($review['reviews'], 0, 70) ?>
                                        </span>


                                    </div>

                                </div>

                                <div class="text-sm flex justify-end items-center space-x-2 mt-3">



                                    <div class="flex justify-center items-center space-x-2">

                                        <?php if ($countreply->countreply($review['id']) > 0): ?>
                                            <div id="" data-viewreplyid="<?php echo $review['id'] ?>"
                                                class="text-xs hover:cursor-pointer seemorereply">
                                                <span>See more reply</span>
                                            </div>

                                        <?php endif; ?>

                                        <div class="text-xs flex justify-center items-center hover:cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                            </svg>
                                            <span><span>12</span> Votes</span>


                                        </div>

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




                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                                    </svg>

                                                </div>
                                                <div class="ml-12">
                                                    <?php echo $replyreviews['replies'] ?>

                                                </div>

                                            </div>

                                            <div class="text-sm flex justify-end items-center space-x-2 mt-3">
                                                <span>
                                                    <?php if ($countreply->countreviewreply($replyreviews['reviewreplyid']) > 0): ?>
                                                        <div id="" data-viewreplyid="<?php echo $replyreviews['reviewreplyid'] ?>"
                                                            class="text-xs hover:cursor-pointer seemorereply">
                                                            <span>See more reply</span>
                                                        </div>
                                                    <?php endif; ?>
                                                </span>


                                                <div class="text-xs flex justify-center items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                                                    </svg>
                                                    <span>Vote</span>

                                                </div>

                                                <div id="reply_btns_<?php echo $replyreviews['reviewreplyid'] ?>"
                                                    class="text-xs flex justify-center items-center "
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








                                    <?php
                                endif;
                                ?>


                                <?php
                            endforeach;
                            ?>
                        </div>






                    </div>

                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>







<script>





    // reply  
    const reply_btns = document.querySelectorAll('.reply_btns');
    const replymodal = document.getElementById('replymodal_<?php echo $review['id'] ?>');
    const reply_id = document.getElementById('reply_id');
    const review_id = document.getElementById('review_id');
    const reply_text = document.getElementById('replytext');
    const item_id = document.getElementById('item_id');
    const tousernamemodal = document.getElementById('tousername');
    const touser_name = document.getElementById('touser_name');
    const tousernameclass = document.querySelector('.tousernameclass');
    const replybtnsubmit = document.getElementById('replybtnsubmit');

    reply_btns.forEach((ele, idx) => {
        ele.addEventListener('click', function () {
            const replyid = ele.getAttribute('data-reply-id');
            const reviewid = ele.getAttribute('data-review-id');
            const itemid = ele.getAttribute('data-item-id');
            const username = ele.getAttribute('data-username');

            data = {
                "replyid": replyid,
                "reviewid": reviewid,
                "itemid": itemid,
                "username": username
            }

            const reviewmodals = ele.parentElement.parentElement.parentElement.parentElement
            appendreviewmodal(reviewmodals, data)

            tousernamemodal.innerText = username
            ele.setAttribute('replybtnid', 'reply_btns_' + reviewid)

        })
    })








    // see more reply 

    const seemorereply = document.querySelectorAll('.seemorereply');
    Array.from(seemorereply).filter((ele, idx) => {
        const newseemoredataid = seemorereply[idx].getAttribute('data-viewreplyid');
        seemorereply[idx].id = 'seemorereply_' + newseemoredataid
        const getseemoreid = document.getElementById('seemorereply_' + newseemoredataid);

        getseemoreid.addEventListener('click', function () {
            const reviewparent = ele.parentElement.parentElement.parentElement.parentElement.children
            const children_except_first_and_last = Array.from(reviewparent).slice(1); // except original review and review modal 

            children_except_first_and_last.forEach((child, idx) => {
                const classtoggled = child.classList.toggle('hidden');

            });

            // set reply modal 
            for (var i = 1; i <= children_except_first_and_last.length; i++) {

                const secondary_reply_btn = ele.parentElement.parentElement.parentElement.parentElement.children[i].children[0].children[1].children
                const atom_replies = ele.parentElement.parentElement.parentElement.parentElement.children[i]

                secondary_reply_btn[2].addEventListener('click', function () {
                    const reviewmodals = this.parentElement.parentElement.parentElement.parentElement;
                    const lastchild_id = reviewmodals.children.length - 1;
                    const to_write_review = reviewmodals.children[lastchild_id]
                    const secondary_reply_box = this.parentElement.parentElement.parentElement;

                    const replyid = secondary_reply_btn[2].getAttribute('data-reply-id');
                    const reviewid = secondary_reply_btn[2].getAttribute('data-review-id');
                    const itemid = secondary_reply_btn[2].getAttribute('data-item-id');
                    const username = secondary_reply_btn[2].getAttribute('data-username');

                    data = {
                        "replyid": replyid,
                        "reviewid": reviewid,
                        "itemid": itemid,
                        "username": username
                    }

                    appendreviewmodal(secondary_reply_box, data);

                })
            }
        })
    })



    function appendreviewmodal(appendparent, datas) {


        if (!appendparent.hasAppendedTowritemodal) {

            const towritemodal = document.createElement('div');

            towritemodal.innerHTML = `
                <div id="replymodal_<?php echo $review['id'] ?>"
                            class="space-y-2 border rounded-md px-5 py-2 mb-5 mt-5 ">

                    <form action="" method="post" id="submitreview" class="w-full">

                        <div class="space-y-4">
                            <div class="flex justify-between ">
                                <h1 class="text-sm font-medium">
                                    <div class="flex justify-center items-center  space-x-2">
                                        <div class="flex justify-center items-center">
                                            <div class="w-10 h-10 border bg-gray-400 rounded-full mr-2">
                                                <img src="" alt="">
                                            </div>
                                            <span class="capitalize">
                                                <?php echo $data['user']['name'] ?>
                                            </span>
                                        </div>
                                        <div>
                                            replies to
                                        </div>
                                        <div>
                                            <span class="tousernameclass capitalize">
                                                ${data['username']}
                                            </span>
                                        </div>
                                    </div>
                                </h1>

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                                </svg>

                            </div>
                            <div class="ml-12">
                                <textarea name="replytext" id="replytext" value=""
                                    class="w-full focus:outline-none focus:ring-1 focus:ring-gray-200 resize-none p-2"
                                    cols="30" rows="" placeholder="Type review here" autofocus
                                    style="scrollbar-width:none;"></textarea>
                            </div>

                        </div>

                            <div class="text-sm flex justify-end items-center space-x-3 mt-3"
                            onclick="document.getElementById('replymodal').classList.toggle('hidden')">
                                <div class="text-md flex justify-center items-center hover:opacity-80">
                                    <button>Cancle</button>

                                </div>

                                <button type="submit" name="replybtn" id="replybtnsubmit"
                                    class="text-md rounded-md px-2 py-1 flex justify-center items-center border border-[#4c5372] hover:bg-gray-100">

                                    <span> Submit</span>
                                </button>
                            </div>


                            <input type="hidden" name="reply_id" id="reply_id" value="${data['replyid']}">
                            <input type="hidden" name="review_id" id="review_id" value="${data['reviewid']}">
                            <input type="hidden" name="item_id" id="item_id" value="${data['itemid']}">
                            <input type="hidden" name="touser_name" id="touser_name" value="${data['username']}">
                    </form>

                </div>`;


            appendparent.appendChild(towritemodal);
            appendparent.hasAppendedTowritemodal = true;
        }
    }






    // Arranging of reply

    const review_containers = document.querySelectorAll('.review_containers');


    let array = [];
    let id_array = [];
    let targetid_array = [];


    for (var i = 0; i < review_containers.length; i++) {
        const replies = review_containers[i].children;

        var id_ui;
        var datareply_ui;

        for (var x = 0; x < replies.length; x++) {
            var datareplyid = replies[x].getAttribute('data-reply-id')
            var id = replies[x].id

            id_array.push(id);
            targetid_array.push(datareplyid);

            var targetid;
        }
    }


    let mutual_numbers = id_array.filter(num => targetid_array.includes(num))


    for (var j = 0; j < mutual_numbers.length; j++) {
        // console.log(mutual_numbers[j])

        const primary_replyidui = document.getElementById(mutual_numbers[j]);
        const atom_replyidui = document.querySelectorAll('.r_' + mutual_numbers[j]);

        let atomreplyui = Array.from(atom_replyidui);

        for (var a = 0; a < atom_replyidui.length; a++) {

            if (atomreplyui[a]) {
                primary_replyidui.appendChild(atomreplyui[a])
            }

        }



    }





































    // substring 
    const reviewctn = document.getElementById('content_<?php echo $review['id'] ?>');

    reviewctn.addEventListener('click', function () {
        this.innerText = '<?php echo htmlspecialchars($review['reviews']); ?>'

    })




</script>