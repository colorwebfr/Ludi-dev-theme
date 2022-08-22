
function LinkDisabled(targetEvent, hasClassTarget)
{
	targetEvent.click(function (e) 
	{ 
		if ($(this).hasClass(hasClassTarget))
		{
			e.preventDefault();
			console.log('valeur null');
		}
	});
}