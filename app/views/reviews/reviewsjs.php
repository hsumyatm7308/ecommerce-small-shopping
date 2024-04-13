<script>

    // reply  
    const reply_btns = document.querySelectorAll('.reply_btns');
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

            // tousernamemodal.innerText = username
            // ele.setAttribute('replybtnid', 'reply_btns_' + reviewid)

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

                    // const replymodals = document.querySelectorAll('.replymodals');

                })
            }

        })
    })



    function appendreviewmodal(appendparent, datas) {

        const towritemodal = document.createElement('div');

        towritemodal.innerHTML = `
                <div id="replymodal_${data['replyid']}"
                            class="space-y-2 border rounded-md px-5 py-2 mb-5 mt-5 replymodals">

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



        if (!appendparent.hasAppendedTowritemodal) {
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




    // Rating 

    // rating percent 
    const ratings = <?php echo json_encode($data['rating_numbers']); ?>;

    const ratingcounts = {};
    const progressarr = [];
    ratings.forEach(item => {
        const rating = item.rating;
        if (ratingcounts[rating]) {
            ratingcounts[rating]++;
        } else {
            ratingcounts[rating] = 1;
        }
    });

    const getkey = Object.keys(ratingcounts);
    const total_ratings = ratings.length; // Total number of ratings

    const progresses = document.querySelectorAll('.progress');

    progresses.forEach((ele, idx) => {
        ele.style.width = '0%';
        let progressid = ele.getAttribute('progress-id');

        console.log(ele)

        if (getkey.includes(progressid)) {

            const rating_count = ratingcounts[progressid];
            const percentage = (rating_count / total_ratings) * 100;


            ele.style.width = percentage + '%';
        }
    });



    //review stars 
    const allraing = <?php echo json_encode($data['rating_numbers']); ?>;
    var starid;

    allraing.forEach(item => {
        const rating = item.rating;
        const userId = item.user_id;
        const starid = item.id;

        const review_stars = document.querySelectorAll('.review_star_' + starid);
        for (let i = 0; i < rating; i++) {
            if (review_stars[i]) {
                review_stars[i].setAttribute('fill', 'yellow');
            }
        }
    });




    // review edit and delete modal 
    const ed_del_btns = document.querySelectorAll('.ed_del_btns')
    console.log(ed_del_btns)

    ed_del_btns.forEach((ele, idx) => {
        ele.addEventListener('click', function () {
            const curele_id = ele.getAttribute('ed_del_btn');
            const curele = document.getElementById('ed_del_modal_' + curele_id);

            const allmodals = document.querySelectorAll('.ed_del_modal');
            allmodals.forEach(modal => {
                if (modal !== curele) {
                    modal.classList.add('hidden');
                }
            });
            curele.classList.toggle('hidden')
        })
    });




    // Start Delete
    const deletebtn = document.querySelectorAll('.delete_btn');

    console.log(deletebtn)

    deletebtn.forEach(btn => {
        btn.addEventListener('click', (e) => {


            const deletemodal = document.getElementById('deletemodal')
            deletemodal.classList.toggle('hidden');

            const getid = e.target.getAttribute('data-id')


            const deletemodal_input = document.getElementById('deletemodal_input')
            deletemodal_input.setAttribute('value', getid);

            console.log(deletemodal_input)


        })

    });






</script>