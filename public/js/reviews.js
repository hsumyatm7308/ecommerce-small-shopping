const primary_votes = document.getElementById('vote_');
const voting_btns = document.querySelectorAll('.voting_btns')
console.log(voting_btns)

voting_btns.forEach((ele, idx) => {
    ele.addEventListener('change', function () {
        console.log(ele.getAttribute('data-vote-id'))
    })
})