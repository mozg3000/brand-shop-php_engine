
delete_item= document.getElementById("delete_item");
delete_item.addEventListener('click',(evt)=>{

    (evt.preventDefault) ? evt.preventDefault() : evt.returnValue = false;

    id=evt.target.dataset.id;
    console.log(id);


deleteFromCart(id).then(res=>{

    //console.log(res);
});
quantity=document.getElementById('quantity');
if(quantity.innerText>0){

    quantity.innerText=quantity.innerText-1;
}
if(quantity.innerText==0){


    evt.target.parentElement.parentElement.style.display='none';
}
})
async function deleteFromCart(id){

    // console.log(id);
    response = await fetch("/api/deleteFromCart/"+id);
    // console.log("/api/showOrder/"+id);
    //     fetch("/api/setOrderStatus/"+id + "/?new_status=" +newstatus).
    //     then(data => data.json()).
    //     then(res=>console.log(res));
    //data = await response.json();


    //return data;
}