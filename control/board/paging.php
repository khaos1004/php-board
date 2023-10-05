<?php
include "../../include/session.php";
include "../db/conn.php";


// 현재 페이지 번호 받아오기
if(isset($_GET["page"])){
    $page = $_GET["page"]; // 하단에서 다른 페이지 클릭하면 해당 페이지 값 가져와서 보여줌
} else {
    $page = 1; // 게시판 처음 들어가면 1페이지로 시작
}
?>


<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Example</title>
</head>
<body>

<!-- 실제 게시판 및 페이징 레이아웃에 필요한 부분 시작-->
    <div class="container">
        <br/>
        <div class="row"> <!-- 메인 글 영역-->
            <div class="col-12" id="content">
                <!-- 게시물 목록 -->
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">번호</th>
                            <th scope="col" class="text-center">제목</th>
                            <th scope="col" class="text-center">작성자</th>
                            <th scope="col" class="text-center">작성일</th>
                            <th scope="col" class="text-center">조회수</th>
                        </tr>
                    </thead>

                    <?php					
                    $sql = mq("SELECT * FROM board");

                    $total_record = mysqli_num_rows($sql); // 불러올 게시물 총 개수

                    $list = 10; // 한 페이지에 보여줄 게시물 개수
                    $block_cnt = 5; // 하단에 표시할 블록 당 페이지 개수
                    $block_num = ceil($page / $block_cnt); // 현재 페이지 블록
                    $block_start = (($block_num - 1) * $block_cnt) + 1; // 블록의 시작 번호
                    $block_end = $block_start + $block_cnt - 1; // 블록의 마지막 번호

                    $total_page = ceil($total_record / $list); // 페이징한 페이지 수
                    if($block_end > $total_page){
                        $block_end = $total_page; // 블록 마지막 번호가 총 페이지 수보다 크면 마지막 페이지 번호를 총 페이지 수로 지정함
                    }
                    $total_block = ceil($total_page / $block_cnt); // 블록의 총 개수
                    $page_start = ($page - 1) * $list; // 페이지의 시작 (SQL문에서 LIMIT 조건 걸 때 사용)

                    // 게시물 목록 가져오기
                    $sql2 = mq("SELECT * FROM board ORDER BY in_num DESC LIMIT $page_start, $list"); // $page_start를 시작으로 $list의 수만큼 보여주도록 가져옴

                    while($board = $sql2->fetch_array()){
                        $title=$board["title"];
                        /* 제목 글자수가 30이 넘으면 ... 표시로 처리해주기 */
                        if(strlen($title)>30){
                            $title=str_replace($board["title"],mb_substr($board["title"],0,30,"utf-8")."...",$board["title"]);
                        }
                    ?>

                    <tbody>
                        <tr>
                            <td width="70" class="text-center"><?=$board['num'];?></td>
                            <td width="300">
                                <span class="read_check" style="cursor:pointer" data-action="./read.php?num=<?=$board['num']?>"><?=$title?></span>
                            <td width="70" class="text-center"><?=$board["writer"];?></td>
                            <td width="90" class="text-center"><?=$board["wdate"];?></td>
                            <td width="50" class="text-center"><?=$board["views"];?></td>
                        </tr>
                    </tbody>
                    <?php
                    }
                    ?>
                </table>

                <!-- 게시물 목록 중앙 하단 페이징 부분-->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <?php
                            if ($page <= 1){
                                // 빈 값
                            } else {
                                if(isset($unum)){
                                    echo "<li class='page-item'><a class='page-link' href='/test/test.php?page=1' aria-label='Previous'>처음</a></li>";
                                } else {
                                    echo "<li class='page-item'><a class='page-link' href='/test/test.php?page=1' aria-label='Previous'>처음</a></li>";
                                }
                            }

                            if ($page <= 1){
                                // 빈 값
                            } else {
                                $pre = $page - 1;
                                if(isset($unum)){
                                    echo "<li class='page-item'><a class='page-link' href='/test/test.php?page=$pre'>◀ 이전 </a></li>";
                                } else {
                                    echo "<li class='page-item'><a class='page-link' href='/test/test.php?page=$pre'>◀ 이전 </a></li>";
                                }
                            }

                            for($i = $block_start; $i <= $block_end; $i++){
                                if($page == $i){
                                    echo "<li class='page-item'><a class='page-link' disabled><b style='color: #df7366;'> $i </b></a></li>";
                                } else {
                                    if(isset($unum)){
                                        echo "<li class='page-item'><a class='page-link' href='/test/test.php?page=$i'> $i </a></li>";
                                    } else {
                                        echo "<li class='page-item'><a class='page-link' href='/test/test.php?page=$i'> $i </a></li>";
                                    }
                                }
                            }

                            if($page >= $total_page){
                                // 빈 값
                            } else {
                                $next = $page + 1;
                                if(isset($unum)){
                                    echo "<li class='page-item'><a class='page-link' href='/test/test.php?page=$next'> 다음 ▶</a></li>";
                                } else {
                                    echo "<li class='page-item'><a class='page-link' href='/test/test.php?page=$next'> 다음 ▶</a></li>";
                                }
                            }

                            if($page >= $total_page){
                                // 빈 값
                            } else {
                                if(isset($unum)){
                                    echo "<li class='page-item'><a class='page-link' href='/test/test.php?page=$total_page'>마지막</a>";
                                } else {
                                    echo "<li class='page-item'><a class='page-link' href='/test/test.php?page=$total_page'>마지막</a>";
                                }
                            }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
<!-- 실제 게시판 및 페이징 레이아웃에 필요한 부분 끝-->

</body>
</html>
