<!-- Footer -->
<div id ="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span>© Copyright <span id='date'></span> News | Powered by <a href="http://yahoobaba.net/">Yahoo Baba</a></span>
            </div>
        </div>
    </div>
</div>
<!-- /Footer -->
</body>
<script>
    const currentDate = new Date().getFullYear();
    document.getElementById('date').innerHTML = currentDate;
    console.log(currentDate)
</script>
</html>
