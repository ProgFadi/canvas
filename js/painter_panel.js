let work_image = document.getElementById('work_image');
let view = document.getElementById('work_image_view');
work_image.addEventListener('change',function(event){
   view.src =  URL.createObjectURL(event.target.files[0])

})


// for search process
// get keywords
let searchInput = document.getElementById('works-search-input');
let tableBody = document.getElementById("painter-works-tbody");
let trs = tableBody.getElementsByTagName("tr");

function searchByName()
{
    let keywords = searchInput.value
    // let keywords = searchInput.;

    if(keywords.length > 0)
    {
        // start searching
        for(let i =0; i<trs.length;i++)
        {
            let tds = trs[i].getElementsByTagName('td');
            let titleValue = tds[1].innerText;
            if(titleValue.toLowerCase().includes(keywords.toLowerCase()))
            {
                trs[i].style.display = 'table-row';
            }
            else{
                trs[i].style.display = 'none';
            }
        }

       
    }
    else{
        for(let i =0;i<trs.length;i++)
        {
            trs[i].style.display = 'table-row';   
        }
    }
}


