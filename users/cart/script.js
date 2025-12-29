const commentBtns = document.querySelectorAll('.post-comments');

commentBtns.forEach(commentBtn => {
  commentBtn.addEventListener('click', () => {
    const commentsSection = commentBtn.parentNode.parentNode.querySelector('.post-comments-section');
    commentsSection.style.display = commentsSection.style.display === 'none' ? 'block' : 'none';
  });
});

document.getElementById("my_posts").style.display="none";
document.getElementById("my_fav").style.display="none";
document.getElementById("my_likes").style.display="none";

var loadFile = function (event) {
  var image = document.getElementById("output");
  image.src = URL.createObjectURL(event.target.files[0]);
};

function myPost() {
  document.getElementById("cart_icon").style.color = "green";
  document.getElementById("my_posts").style.display="block";
  document.getElementById("my_fav").style.display="none";
  document.getElementById("my_likes").style.display="none";
}

function myLikes() {
  document.getElementById("cart_icon").style.color = "orange";
  document.getElementById("my_posts").style.display="none";
  document.getElementById("my_fav").style.display="none";
  document.getElementById("my_likes").style.display="block";
}

function myFav() {
  document.getElementById("cart_icon").style.color = "yellow";
  document.getElementById("my_posts").style.display="none";
  document.getElementById("my_fav").style.display="block";
  document.getElementById("my_likes").style.display="none";
}