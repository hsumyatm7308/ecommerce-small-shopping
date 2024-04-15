

//description and review
const des_and_rev = document.querySelectorAll('.des_and_rev');
const des_and_rev_text = document.querySelectorAll('.des_and_rev_text');

des_and_rev.forEach((ele, idx) => {
    ele.addEventListener('click', () => {
        if (idx == 0) {


            des_and_rev_text[0].classList.add('hidden')
            des_and_rev_text[1].classList.remove('hidden')
            des_and_rev[1].classList.add('border-2', 'border-b-transparent')
            des_and_rev[0].classList.remove('border-2', 'border-b-transparent')

        } else {

            des_and_rev_text[0].classList.remove('hidden')
            des_and_rev_text[1].classList.add('hidden')
            des_and_rev[1].classList.remove('border-2', 'border-b-transparent')
            des_and_rev[0].classList.add('border-2', 'border-b-transparent')
        }
    })
});





