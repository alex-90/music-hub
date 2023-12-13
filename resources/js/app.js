import './bootstrap';
import GreenAudioPlayer from './player';

window.onload = () => {
    
}

document.addEventListener('DOMContentLoaded', function() {


    const arr = document.getElementsByClassName('example');

    // console.log(arr);

    for(let i=0; i < arr.length; i++){

        // arr[i].onloadedmetadata = function() {
        //     alert(arr[i].duration);
        // };

        // console.log(arr[i]);

        const audio = arr[i].getElementsByTagName('audio')[0];
        audio.onloadedmetadata = function() {
            // alert(this.duration);

            // this.duration = "05:00";

            // if (this.duration === Infinity) {
            //     this.currentTime = 10000000;
            //     setTimeout(() => {
            //         this.currentTime = 0; // to reset the time, so it starts at the beginning
            //     }, 1000);
            // }
            // let duration = this.duration;

            // console.log(duration);
        };

        // alert(1);
        // console.log(audio.duration);

        new GreenAudioPlayer(arr[i], {
            // selector: '.player',
            // enableKeystrokes: true,
            // showDownloadButton: true,

            stopOthersOnPlay: true
        });
    }

    
    // for(var i in arr){
    //     console.log(i);
    // }
    // arr.forEach((i) => {
    //     console.log(i);
    // })
    // arr.map(function (e) {
    //     console.log(e);
    // });
    
    // document.getElementsByClassName('example').toArray().forEach ((element, index, array) =>{
        

        // new GreenAudioPlayer(i);
    // })
    // new GreenAudioPlayer('.example');
});