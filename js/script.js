const deleteAjaxBtns = document.querySelectorAll('.delete-ajax')

for (const btn of deleteAjaxBtns) {
	btn.addEventListener('click', (e)=>{
		e.preventDefault();
		const id = btn.dataset.id;
		console.log(id);

		axios({
	  	method: 'post',
	  	url: '/post/delete-ajax',
	  	data: 'id='+id
		})
		.then(function(){
			btn.parentElement.parentElement.remove();
		})
	});
}

let editingTitle = document.querySelector('h1.title-post');
let editingInput = document.getElementById('field');
let container = document.getElementById('container');
container.style.display = "none";
/*container.hidden = true;*/
/*container.classList.toggle('hidden');*/
const titleId = editingTitle.dataset.id;

editingTitle.addEventListener('dblclick', (e)=>{
	editingTitle.style.display = "none";
	container.style.display = "block";
	/*container.classList.toggle('hidden');*/	
})
editingInput.addEventListener('blur', (e)=>{
		let result = editingInput.value;
		console.log(result);
		console.log(titleId);
		
		editingInput.style.display = "block";
		
		axios({
	  	method: 'post',
	  	url: '/post/edit-ajax',
	  	/*url: '/post/'+titleId+'/edit',
	  	url: `/post/${titleId}/edit`,*/	  	
	  	data: `id=${titleId}&name=${result}`	  	
		})
		.then(function(){
			editingTitle.style.display = "block";			
			container.style.display = "none"
		})
	});