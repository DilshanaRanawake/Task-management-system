<header class="header">
    <h2 class="u-name">Task<b>Mate</b>
        <label for="checkbox">
            <i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
        </label>
    </h2>
    <span class="notification" id="notificationBtn">
        <i class="fa fa-bell" aria-hidden="true"></i>
        <span>&nbsp;7&nbsp;</span>
    </span>
</header>
<div class="notification-bar" id="notificationBar">
    <ul>
        <li>
            <a href="">
                <mark>New Task Assigned</mark>
                Notification 1 example
                &nbsp;&nbsp;<small>Feb 7, 2025</small>
            </a>
        </li>
        <li>
            <a href="">
                <mark>New Task Assigned</mark>
                Notification 2 example
                &nbsp;&nbsp;<small>Feb 1, 2025</small>
            </a>
        </li>
        <li>
            <a href="">
                <mark>New Task Assigned</mark>
                Notification 3 example
                &nbsp;&nbsp;<small>Jan 31, 2025</small>
            </a>
        </li>
    </ul>
</div>
<script type="text/javascript">
    var openNotification = false;

    const notification =()=>{
        let notificationBar = document.querySelector("#notificationBar");
        if (openNotification) {
            notificationBar.classList.remove('open-notification');
            openNotification = false;
        }else{
            notificationBar.classList.add('open-notification');
            openNotification = true;
        }
    }
    let notificationBtn = document.querySelector("#notificationBtn");
    notificationBtn.addEventListener("click", notification);
</script>