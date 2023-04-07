// var vue = new Vue ({
//     el: '#car', //網頁最外層的 id，所有 vue 操控的部分，皆要寫在裡面
//     data: {
//       //網頁用到的資料都放在這
//       product :[]
//     },

//     created: function () {
//       // 網頁載入完成，先執行的 function 內容寫在這(像 jQ 的 .ready())
//       var dataUrl= "control.php"

//         axios.get(dataUrl)
//         .then( (res) => {
//             // console.log(res.data);
//             this.product=res.data;
//             // console.log(this.product);
//             console.log(typeof (this.product));
//         })
//         .catch( (err) => {
//             console.log(err);
//         });
//     },
//     methods: {
//       //各種要用的 function 寫在這
//     },
//     computed: {
//       //計算屬性，好用，但此範例沒用到 XDD
//     }
    
//   });


var vm = new Vue({
    el:'#car',
    data(){
        return {
            info:'null',
        }
    },
    mounted(){
        axios
            .get('control.php')
            .then(response=>(this.info=response.data))
            .catch(function (error) {
                alert(error)
            })
    },
    
});