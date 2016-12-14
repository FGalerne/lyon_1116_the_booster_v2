function messengerForm(index){

    var user = document.getElementById('baseUsername').innerHTML;

    var subject = document.getElementById('subject'+index).innerHTML;
    var user1 = document.getElementById('user1'+index).innerHTML;
    var user2 = document.getElementById('user2'+index).innerHTML;
    var message = tinyMCE.get('message'+index).getContent();

    var createTime = Date.now();

    document.getElementById('boosterbundle_messenger_title').value = subject;
    document.getElementById('boosterbundle_messenger_user1').value = user ;

    if(user == user1)
        document.getElementById('boosterbundle_messenger_user2').value = user2;
    else
        document.getElementById('boosterbundle_messenger_user2').value = user1;

    document.getElementById('boosterbundle_messenger_message').value = message;
    document.getElementById('boosterbundle_messenger_createTime').value = createTime;

    document.getElementById('messengerSubmit').submit();
}