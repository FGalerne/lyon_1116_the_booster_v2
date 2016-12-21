function messengerForm(index){

    var user = document.getElementById('baseUsername').innerHTML;
    var subject = document.getElementById('subject'+index).innerHTML;
    var user1 = document.getElementsByClassName('user1'+index)[0].innerHTML;
    var user2 = document.getElementsByClassName('user2'+index)[0].innerHTML;
    var message = tinyMCE.get('message'+index).getContent();

    document.getElementById('boosterbundle_messenger_title').value = subject;
    document.getElementById('boosterbundle_messenger_user1').value = user;

    if(user == user1) document.getElementById('boosterbundle_messenger_user2').value = user2;
    else document.getElementById('boosterbundle_messenger_user2').value = user1;

    document.getElementById('boosterbundle_messenger_message').value = message;
    document.getElementById('boosterbundle_messenger_user1Read').value = 1;
    document.getElementById('boosterbundle_messenger_user2Read').value = 0;
    document.getElementById('messengerSubmit').submit();

}
function displayMessages(index){

    var messages = document.getElementsByClassName('messenger-messages');
    if( messages[index].style.display !== 'inline')
        messages[index].style.display = 'inline';
    else
        messages[index].style.display = 'none';
}
