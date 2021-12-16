function getdata() {
    var user=document.getElementById("kebun").value;


    firebase.database().ref('kebun/'+kebun).once('value').then(function (snapshot){

        var tegangan=snapshot.val().tegangan;
        var air=snapshot.val().air;


        document.getElementById("tegangan").innerHTML=tegangan;
        document.getElementById("air").innerHTML=air;
    })
}
    