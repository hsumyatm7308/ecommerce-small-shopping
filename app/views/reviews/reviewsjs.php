<script>

    //description and review

    const current_url = window.location.href;
    console.log(current_url.includes('page'))
    if (current_url.includes('page')) {
        const des_and_rev = document.querySelectorAll('.des_and_rev');
        const des_and_rev_text = document.querySelectorAll('.des_and_rev_text');

        des_and_rev.forEach((ele, idx) => {
            if (idx == 0) {


                des_and_rev_text[1].classList.add('hidden')
                des_and_rev_text[0].classList.remove('hidden')
                des_and_rev[0].classList.add('border-2', 'border-b-transparent')
                des_and_rev[1].classList.remove('border-2', 'border-b-transparent')

            } else {

                des_and_rev_text[1].classList.remove('hidden')
                des_and_rev_text[0].classList.add('hidden')
                des_and_rev[0].classList.remove('border-2', 'border-b-transparent')
                des_and_rev[1].classList.add('border-2', 'border-b-transparent')
            }
        });

    }





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


        //review stars 
        const userId = item.user_id;
        const starid = item.id;
        const review_stars = document.querySelectorAll('.review_star_' + starid);
        for (let i = 0; i < rating; i++) {
            if (review_stars[i]) {
                review_stars[i].setAttribute('fill', 'yellow');
            }
        }
    });

    const getkey = Object.keys(ratingcounts);
    const total_ratings = ratings.length; // Total number of ratings
    const progresses = document.querySelectorAll('.progress');

    progresses.forEach((ele, idx) => {
        ele.style.width = '0%';
        let progressid = ele.getAttribute('progress-id');

        if (getkey.includes(progressid)) {
            const rating_count = ratingcounts[progressid];
            const percentage = (rating_count / total_ratings) * 100;
            ele.style.width = percentage + '%';
        }
    });



    // reply  feature 
    const reply_btns = document.querySelectorAll('.reply_btns');
    const reply_id = document.getElementById('reply_id');
    const review_id = document.getElementById('review_id');
    const reply_text = document.getElementById('replytext');
    const item_id = document.getElementById('item_id');
    const tousernamemodal = document.getElementById('tousername');
    const touser_name = document.getElementById('touser_name');
    const tousernameclass = document.querySelector('.tousernameclass');
    const replybtnsubmit = document.getElementById('replybtnsubmit');



    // primary 


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

        }
    }


    let mutual_numbers = id_array.filter(num => targetid_array.includes(num))

    for (var j = 0; j < mutual_numbers.length; j++) {

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
    const reviews_substring = document.querySelectorAll('.reviews_substring');
    reviews_substring.forEach((ele) => {
        ele.addEventListener('click', function () {
            ele.innerHTML = ele.getAttribute('data-content');
        })
    })




    //primary
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


            const reviewmodals = ele.parentElement.parentElement.parentElement.parentElement;
            const existing_replymodal = document.querySelector('.reply_editmodal');

            if (existing_replymodal) {
                existing_replymodal.remove();
                reviewmodals.hasAppendedTowritemodal = false;

                // show again
                const secondary_replies = document.querySelectorAll('.secondary_replies');
                secondary_replies.forEach(sec => {
                    sec.classList.remove('hidden')
                    sec.parentElement.classList.add('border')

                });
            }




            appendreviewmodal(reviewmodals, data);
            hide_edanddelmodal();


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

                secondary_reply_btn[2].addEventListener('click', function () {
                    var secondary_reply_box = this.parentElement.parentElement.parentElement;
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

                    const existing_replymodal = document.querySelector('.reply_editmodal');


                    if (existing_replymodal) {
                        existing_replymodal.remove();
                        secondary_reply_box.hasAppendedTowritemodal = false;


                        // show again
                        const secondary_replies = document.querySelectorAll('.secondary_replies');
                        secondary_replies.forEach(sec => {
                            sec.classList.remove('hidden')
                            sec.parentElement.classList.add('border')

                        });
                    }



                    appendreviewmodal(secondary_reply_box, data);
                    hide_edanddelmodal()

                })
            }

        })
    })



    function appendreviewmodal(appendparent, data) {

        let towritemodal = innerhtml_reply(data);
        let tem_div = document.createElement('div');
        tem_div.classList.add('reply_editmodal')
        tem_div.innerHTML = towritemodal;


        if (!appendparent.hasAppendedTowritemodal) {

            const existing_replymodal = document.querySelector('.reply_editmodal');
            if (existing_replymodal) {
                existing_replymodal.remove();


                // show again
                const secondary_replies = document.querySelectorAll('.secondary_replies');
                secondary_replies.forEach(sec => {
                    sec.classList.remove('hidden')
                    sec.parentElement.classList.add('border')

                });
            }




            appendparent.appendChild(tem_div);
            appendparent.hasAppendedTowritemodal = true;
        }



    }







    // Start Edit 

    // primary edit include rating 


    // review edit and delete modal 
    const ed_del_btns = document.querySelectorAll('.ed_del_btns')

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

            curele.classList.toggle('hidden');



            // check edimodal exit or not


            sec_editbutton_fun();


            pri_editbutton_fun();

        })
    });

    function pri_editbutton_fun() {
        const pri_edit_btn = document.querySelectorAll('.pri_edit_btn');

        pri_edit_btn.forEach(btn => {
            btn.addEventListener('click', (e) => {


                const getid = btn.getAttribute('data-id');
                const getreplies = btn.getAttribute('data-content');
                const getrating = btn.getAttribute('data-rating');

                const reviewmodal = document.getElementById('reviewmodal').classList.remove('hidden');


                checking_replyandeditmodal();


                const getoldreview = document.getElementById('userreview');
                const rating = document.getElementById('rating');
                const review_title = document.getElementById('review_title');
                const submitreview = document.getElementById('submitreview');
                const reviewid = document.getElementById('reviewid');
                reviewid.value = getid;


                review_title.innerText = "Edit your Review"

                getoldreview.value = getreplies;
                getoldreview.innerHTML = getreplies;
                rating.value = getrating;
                submitreview.name = "editreviewbtn"
                submitreview.innerText = 'Update'


            })

        });



    }


    function sec_editbutton_fun() {
        const sec_edit_btn = document.querySelectorAll('.sec_edit_btn');


        sec_edit_btn.forEach(btn => {
            btn.addEventListener('click', (e) => {


                const getid = btn.getAttribute('data-id');
                const getreplies = btn.getAttribute('data-content');
                const gettousername = btn.getAttribute('data-tousername');
                const getreply = document.getElementById(getid);

                const secondary_reply = document.querySelector('.secondary_reply_' + getid);

                data = {
                    "replyid": getid,
                    "username": gettousername

                }





                checking_replyandeditmodal();



                //append editmodal 
                let editmodal = innerhtml_reply(data);
                let tem_div = document.createElement('div');
                tem_div.classList.add('reply_editmodal')
                tem_div.innerHTML = editmodal;

                getreply.appendChild(tem_div);
                secondary_reply.classList.add('hidden');
                getreply.classList.remove('border');





                const textarea = document.querySelector(`.replytext_${getid}`);
                const replybtnsubmit = document.getElementById('replybtnsubmit');
                const editspan = document.querySelector('.editspan_' + getid);

                if (textarea) {
                    textarea.value = getreplies;
                    replybtnsubmit.name = "editsubmit";
                    replybtnsubmit.innerHTML = "Update";
                    editspan.classList.remove('hidden')
                }

            })

        });



    }


    function checking_replyandeditmodal() {

        const existing_editmodal = document.querySelector('.reply_editmodal');

        const secondary_replies = document.querySelectorAll('.secondary_replies');

        if (existing_editmodal) {
            existing_editmodal.remove();

            // show again
            secondary_replies.forEach(sec => {
                sec.classList.remove('hidden')
                sec.parentElement.classList.add('border')
                console.log(sec)

            });


        };


    }

    function hide_edanddelmodal() {
        const allmodals = document.querySelectorAll('.ed_del_modal');
        allmodals.forEach(mod => {
            mod.classList.add('hidden');
        });

    }



    // reply and edit modal box 

    function innerhtml_reply(data = "") {

        return `
                <div id="replymodal_${data['replyid']}"
                            class="space-y-2 border rounded-md px-5 py-2 mb-5 mt-5">

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
                                        <span class="editspan_${data['replyid']} hidden"> (Edit) </span>
                                    </div>
                                </h1>

 
                            </div>
                            <div class="ml-12">
                                <textarea name="replytext" id="replytext" value=""
                                    class="w-full focus:outline-none focus:ring-1 focus:ring-gray-200 resize-none p-2 replytext_${data['replyid']}"
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

                                    <span class="text-submit"> Submit</span>
                                </button>
                            </div>


                            <input type="hidden" name="reply_id" id="reply_id" value="${data['replyid']}">
                            <input type="hidden" name="review_id" id="review_id" value="${data['reviewid']}">
                            <input type="hidden" name="item_id" id="item_id" value="${data['itemid']}">
                            <input type="hidden" name="touser_name" id="touser_name" value="${data['username']}">
                    </form>

                </div>`;


    }




    // End Edit 



    // Start Delete
    const deletebtn = document.querySelectorAll('.delete_btn');

    deletebtn.forEach(btn => {
        btn.addEventListener('click', (e) => {

            const getid = e.target.getAttribute('data-id')
            const getdatatable = e.target.getAttribute('data-table')
            const getdata_id_name = e.target.getAttribute('data-id-name')

            document.getElementById('deletemodal').classList.toggle('hidden')
            document.getElementById('deletemodal_input').setAttribute('value', getid)
            document.getElementById('datatable').setAttribute('value', getdatatable);
            document.getElementById('data_id_name').setAttribute('value', getdata_id_name);



        })

    });
</script>