
$("#upload-work").on("change", (e) => {
	$("#show-name").text($(e.target).prop('files')[0]['name']);
});
$("#show-name").on("click", () => {
	$("#upload-work").click();
})