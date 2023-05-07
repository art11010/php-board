<?php
class View{
    private $title;
    private $content;

    // 게시글 목록, 검색 결과
    public function showListPost($post, $search_option, $search, $currentPage, $totalPage){
        $titleSelected = ($search_option === 'title') ? 'selected' : '';
        $authorSelected = ($search_option === 'author') ? 'selected' : '';
        $contentSelected = ($search_option === 'content') ? 'selected' : '';

        $this -> title = (!$search) ? "게시글 목록" : "게시글 검색 결과";

        $this -> content = <<<HTML
            <h1>{$this -> title}</h1>
            <form action="index.php" method="post">
                <select name="search_option" id="">
                    <option value="title" {$titleSelected}>제목</option>
                    <option value="author" {$authorSelected}>작성자</option>
                    <option value="content" {$contentSelected}>내용</option>
                </select>
                <input type="text" name="search" placeholder="제목을 입력하세요" value="{$search}" style="display: inline-block;">
                <button type="submit">검색</button>
            </form>
            <table>
                <colgroup>
                    <col width="10%" />
                    <col width="50%" />
                    <col width="20%" />
                    <col width="20%" />
                </colgroup>
                <thead class="thead">
                    <tr>
                        <th>번호</th>
                        <th>제목</th>
                        <th>작성자</th>
                        <th>작성일</th>
                        <!-- <th>조회수</th> -->
                    </tr>
                </thead>
                <tbody class="tbody">
        HTML;
        // 문자열 연결 연산자 (.)
        foreach($post as $row){
            $this -> content .= <<<HTML
                    <tr>
                        <td>
                            <a href="view.php?idx={$row['idx']}" class="title">
                                {$row['idx']}
                            </a>
                        </td>
                        <td>
                            <a href="view.php?idx={$row['idx']}" class="title">
                                {$row['title']}
                            </a>
                        </td>
                        <td>
                            {$row['author']}
                        </td>
                        <td>
                            {$row['created_at']}
                        </td>
                    </tr>
            HTML;
        }
        $this -> content .= <<<HTML
                </tbody>
            </table>
            <div class="paging">
                <a href="index.php?page=1">처음</a>
        HTML;
        for($page = 1; $page <= $totalPage; $page++){
            if( $page == $currentPage ){
                $this -> content .= <<<HTML
                    <a href="index.php?page={$page}" class="current">{$page}</a>
                HTML;
            } else {
                $this -> content .= <<<HTML
                    <a href="index.php?page={$page}">{$page}</a>
                HTML;
            }
        }
        $this -> content .= <<<HTML
                <a href="index.php?page={$totalPage}">마지막</a>
            </div>
            <div class="btns_wrap">
                <a href="write.php">글쓰기</a>
        HTML;
        if( $search ){
            $this->content .= <<<HTML
                    <a href="index.php" style="margin-left:4px">목록으로</a>
                </div>
            HTML;
        }

        echo $this -> content;
    }

    // 게시글 보기
    public function showPostView($post){
        $this -> title = "게시글";

        $this -> content = <<<HTML
            <h1>{$this -> title}</h1>
            <table>
                <colgroup>
                    <col width="10%" />
                    <col width="*" />
                </colgroup>
                <tbody class="tbody">
                    <tr>
                        <th class="thead">제목</th>
                        <td>
                            {$post['title']}
                        </td>
                    </tr>
                    <tr>
                        <th class="thead">작성자</th>
                        <td>
                            {$post['author']}
                        </td>
                    </tr>
                    <tr>
                        <th class="thead">작성일</th>
                        <td>
                            {$post['created_at']}
                        </td>
                    </tr>
                    <tr>
                        <th class="thead">내용</th>
                        <td>
                            {$post['content']}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a href="index.php">목록</a>
            <a href="write.php?idx={$post['idx']}">수정</a>
            <a href="delete.php?idx={$post['idx']}">삭제</a>
        HTML;

        echo $this -> content;
    }

    // 게시글 작성, 수정
    public function showPostWrite($post){
        if(!$post){
            $this -> title = "게시글 작성";
        } else {
            $this -> title = "게시글 수정";
            $type = '<input type="hidden" name="type" value="update">';
        }

        $this -> content = <<<HTML
            <h1>{$this -> title}</h1>
            <form action="write_ok.php" method="post">
                <input type="hidden" name="idx" value="{$post['idx']}">
                <input type="hidden" name="storedpwd" value="{$post['password']}">
                {$type}
                <label>
                    제목
                    <input type="text" name="title" value="{$post['title']}">
                </label>
                <label>
                    작성자
                    <input type="text" name="author" value="{$post['author']}">
                </label>
                <label>
                    내용
                    <textarea cols="30" rows="10" name="content">{$post['content']}</textarea>
                </label>
                <label>
                    비밀번호
                    <input type="password" name="password" class="pwd">
                </label>
        HTML;
        if($post){
            $this -> content .= <<<HTML
                <button type="submit">수정하기</button>
            HTML;
        } else{
            $this -> content .= <<<HTML
                <button type="submit">작성하기</button>
            HTML;
        }
        $this -> content .= <<<HTML
            </form>
        HTML;

        echo $this -> content;
    }

    // 게시글 삭제
    public function showPostDelete($post){
        $this -> title = "게시글 삭제";
        $this -> content = <<<HTML
            <h1>{$this -> title}</h1>
            <form action="write_ok.php" method="post">
                <input type="hidden" name="idx" value="{$post['idx']}">
                <input type="hidden" name="storedpwd" value="{$post['password']}">
                <input type="hidden" name="type" value="delete">
                <label>
                    비밀번호 확인
                    <input type="password" name="password" class="pwd">
                </label>
                <button type="submit">삭제하기</button>
            </form>
        HTML;

        echo $this -> content;
    }

    // 게시글 작성, 수정, 삭제 완료
    public function showCompletePost($txt){
        $this -> title = "{$txt}";
        $this -> content = <<<HTML
            <h1>{$this -> title}</h1>
            <a href="index.php">목록으로</a>
        HTML;
        echo $this -> content;
    }
}
?>