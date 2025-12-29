// get DOM elements
const friendList = document.querySelectorAll('.friend');
const chatHeader = document.querySelector('.chat-header');
const chatMessages = document.querySelector('.chat-messages');
const chatInput = document.querySelector('.chat-input input[type="text"]');
const chatForm = document.querySelector('.chat-input');

// set active friend to first friend in list
let activeFriend = friendList[0];

// add event listeners to friend list items
friendList.forEach(friend => {
  friend.addEventListener('click', () => {
    // remove active class from all friends
    friendList.forEach(f => f.classList.remove('active'));
    // add active class to clicked friend
    friend.classList.add('active');
    // set active friend to clicked friend
    activeFriend = friend;
    // update chat header with friend name and status
    const name = friend.querySelector('.name').textContent;
    const status = friend.querySelector('.status').textContent;
    chatHeader.querySelector('img').setAttribute('src', friend.querySelector('img').getAttribute('src'));
    chatHeader.querySelector('h3').textContent = name;
    chatHeader.querySelector('p').textContent = status;
    // clear chat messages
    chatMessages.innerHTML = '';
    // display messages for active friend
    const messages = activeFriend.querySelector('.messages').innerHTML;
    chatMessages.innerHTML = messages;
  });
});

// add event listener to chat input form
// chatForm.addEventListener('submit', (e) => {
//   e.preventDefault();
//   const message = chatInput.value;
//   // create message element
//   const messageElement = document.createElement('div');
//   messageElement.classList.add('message', 'received');
//   messageElement.innerHTML = '<p>' + message + '</p>';
//   // add message to chat messages container
//   chatMessages.appendChild(messageElement);
//   chatMessages.scrollTop = chatMessages.scrollHeight;
//   // clear input field
//   chatInput.value = '';
// });