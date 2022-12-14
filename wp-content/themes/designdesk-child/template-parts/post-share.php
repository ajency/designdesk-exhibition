<?php
    $postid = get_the_ID();
    $postUrl = get_permalink($postid);
?>
<div class="post-share-container">
    <p class="title">Share:</p>
    <ul class="social-share">
        <li class="share">
            <a class="icon" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $postUrl ?>" target="_blank">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.83851 0C3.52794 0 0 3.52786 0 7.83851V32.1628C0 36.4733 3.52786 40 7.83851 40H32.1628C36.4734 40 40 36.4734 40 32.1628V7.83851C40 3.52794 36.4734 0 32.1628 0H7.83851ZM9.81001 6.6008C11.8768 6.6008 13.1499 7.95764 13.1892 9.74118C13.1892 11.4853 11.8768 12.8803 9.77003 12.8803H9.73125C7.70377 12.8803 6.39331 11.4854 6.39331 9.74118C6.39331 7.95768 7.74342 6.6008 9.80997 6.6008H9.81001ZM27.621 14.9368C31.5959 14.9368 34.5756 17.5349 34.5756 23.1179V33.5404H28.5349V23.8166C28.5349 21.3732 27.6606 19.7061 25.4745 19.7061C23.8056 19.7061 22.8108 20.8297 22.3741 21.9152C22.2145 22.3035 22.1753 22.8459 22.1753 23.3891V33.5404H16.1346C16.1346 33.5404 16.2138 17.0687 16.1346 15.3631H22.1766V17.9372C22.9793 16.6987 24.4152 14.9368 27.621 14.9368V14.9368ZM6.74963 15.3644H12.7904V33.5405H6.74963V15.3644Z" fill="white" />
                </svg>
            </a>
        </li>
        <li class="share">
            <a class="icon" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $postUrl ?>" target="_blank"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M31.9962 16.098C31.9962 7.20605 24.8322 -0.00195312 15.9962 -0.00195312C7.15619 4.68751e-05 -0.0078125 7.20605 -0.0078125 16.1C-0.0078125 24.134 5.84419 30.794 13.4922 32.002V20.752H9.43219V16.1H13.4962V12.55C13.4962 8.51605 15.8862 6.28805 19.5402 6.28805C21.2922 6.28805 23.1222 6.60205 23.1222 6.60205V10.562H21.1042C19.1182 10.562 18.4982 11.804 18.4982 13.078V16.098H22.9342L22.2262 20.75H18.4962V32C26.1442 30.792 31.9962 24.132 31.9962 16.098Z" fill="#041925" />
                </svg>
            </a>
        </li>
        <li class="share">
            <a class="icon" href="https://twitter.com/intent/tweet?text=<?php echo $postUrl ?>" target="_blank">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16 0C7.16429 0 0 7.16429 0 16C0 24.8357 7.16429 32 16 32C24.8357 32 32 24.8357 32 16C32 7.16429 24.8357 0 16 0ZM23.6893 12.0607C23.7 12.2286 23.7 12.4036 23.7 12.575C23.7 17.8179 19.7071 23.8571 12.4107 23.8571C10.1607 23.8571 8.075 23.2036 6.31786 22.0786C6.63929 22.1143 6.94643 22.1286 7.275 22.1286C9.13214 22.1286 10.8393 21.5 12.2 20.4357C10.4571 20.4 8.99286 19.2571 8.49286 17.6857C9.10357 17.775 9.65357 17.775 10.2821 17.6143C9.38474 17.432 8.57812 16.9446 7.99934 16.2349C7.42056 15.5253 7.10531 14.6372 7.10714 13.7214V13.6714C7.63214 13.9679 8.25 14.15 8.89643 14.175C8.35301 13.8128 7.90735 13.3222 7.59897 12.7465C7.29059 12.1709 7.12901 11.528 7.12857 10.875C7.12857 10.1357 7.32143 9.46071 7.66786 8.875C8.66394 10.1012 9.9069 11.1041 11.3159 11.8184C12.725 12.5328 14.2686 12.9427 15.8464 13.0214C15.2857 10.325 17.3 8.14286 19.7214 8.14286C20.8643 8.14286 21.8929 8.62143 22.6179 9.39286C23.5143 9.225 24.3714 8.88929 25.1357 8.43929C24.8393 9.35714 24.2179 10.1321 23.3929 10.6214C24.1929 10.5357 24.9643 10.3143 25.6786 10.0036C25.1393 10.7964 24.4643 11.5 23.6893 12.0607Z" fill="#041925" />
                </svg>
            </a>
        </li>
    </ul>
</div>