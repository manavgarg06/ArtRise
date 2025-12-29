// const commentBtns = document.querySelectorAll('.post-comments');

// commentBtns.forEach(commentBtn => {
//   commentBtn.addEventListener('click', () => {
//     const commentsSection = commentBtn.parentNode.parentNode.querySelector('.post-comments-section');
//     commentsSection.style.display = commentsSection.style.display === 'none' ? 'block' : 'none';
//   });
// });

// // const stars = document.querySelectorAll('.star');
// // let lastClickedIndex = null;
// // stars.forEach((star, index) => {
// //   star.addEventListener('click', () => {
// //     for (let i = 0; i < stars.length; i++) {
// //       if (i <= index) {
// //         stars[i].classList.add('clicked');
// //         lastClickedIndex=i+1;
// //       } else {
// //         stars[i].classList.remove('clicked');
// //       }
// //     }
// //     document.getElementById("star_index").value = lastClickedIndex;
// //   });
// // });

// const cards = document.querySelectorAll('.feed-card');
// cards.forEach((card) => {
//   const stars = card.querySelectorAll('.star');
//   let lastClickedIndex = null;
//   stars.forEach((star, index) => {
//     star.addEventListener('click', () => {
//       for (let i = 0; i < stars.length; i++) {
//         if (i <= index) {
//           stars[i].classList.add('clicked');
//           lastClickedIndex=i+1;
//         } else {
//           stars[i].classList.remove('clicked');
//         }
//       }
//       const starIndexInput = card.querySelector('#star_index-input');
//       if (starIndexInput) {
//         starIndexInput.value = lastClickedIndex;
//       }
//     });
//   });
// });

// var loadFile = function (event) {
//   var image = document.getElementById("output");
//   image.src = URL.createObjectURL(event.target.files[0]);
// };

// ---------------------------------------------------------------------------------------

const commentBtns = document.querySelectorAll('.post-comments');

commentBtns.forEach(commentBtn => {
  commentBtn.addEventListener('click', () => {
    const commentsSection = commentBtn.parentNode.parentNode.querySelector('.post-comments-section');
    commentsSection.style.display = commentsSection.style.display === 'none' ? 'block' : 'none';
  });
});

// const stars = document.querySelectorAll('.star');
// let lastClickedIndex = null;
// stars.forEach((star, index) => {
//   star.addEventListener('click', () => {
//     for (let i = 0; i < stars.length; i++) {
//       if (i <= index) {
//         stars[i].classList.add('clicked');
//         lastClickedIndex=i+1;
//       } else {
//         stars[i].classList.remove('clicked');
//       }
//     }
//     document.getElementById("star_index").value = lastClickedIndex;
//   });
// });

const cards = document.querySelectorAll('.feed-card');
cards.forEach((card) => {
  const stars = card.querySelectorAll('.star');
  let lastClickedIndex = null;
  stars.forEach((star, index) => {
    star.addEventListener('click', () => {
      for (let i = 0; i < stars.length; i++) {
        if (i <= index) {
          stars[i].classList.add('clicked');
          lastClickedIndex=i+1;
        } else {
          stars[i].classList.remove('clicked');
        }
      }
      const starIndexInput = card.querySelector('#star_index-input');
      // console.log(starIndexInput);
      if (starIndexInput) {
        starIndexInput.value = lastClickedIndex;
      }
    });
  });
});

// const cards = document.querySelectorAll('.feed-card');
// cards.forEach((card) => {
//   const stars = card.querySelectorAll('.star');
//   let lastClickedIndex = null;
//   stars.forEach((star, index) => {
//     star.addEventListener('click', () => {
//       for (let i = 0; i < stars.length; i++) {
//         if (i <= index) {
//           stars[i].classList.add('clicked');
//           lastClickedIndex=i+1;
//         } else {
//           stars[i].classList.remove('clicked');
//         }
//       }
//       const starIndexInput = card.querySelector('#star_index-input');
//       if (starIndexInput) {
//         starIndexInput.value = lastClickedIndex;
//       }
//     });
//   });

//   const reviewForm = card.querySelector('form[action="submit-review.php"]');
//   if (reviewForm) {
//     reviewForm.addEventListener('submit', (event) => {
//       const starIndexInput = card.querySelector('#star_index-input');
//       if (starIndexInput) {
//         starIndexInput.value = lastClickedIndex;
//       }
//     });
//   }
// });


var loadFile = function (event) {
  var image = document.getElementById("output");
  image.src = URL.createObjectURL(event.target.files[0]);
};
