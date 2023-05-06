<?php
class View{
    private $title;
    private $content;

    public function showPostList($post, $type){
        if($type === 'list'){
            $this -> title = "게시글 목록";
        } else if ($type === 'search'){
            $this -> title = "게시글 검색 결과";
        }

        $this -> content = <<<HTML
            <h1>{$this -> title}</h1>
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
        foreach($post as $row){
            $this -> content .= <<<HTML
                        <tr>
                            <td>
                                <a href="view.php?idx={$row['idx']}" class="title">
                                    {$row["idx"]}
                                </a>
                            </td>
                            <td>
                                <a href="view.php?idx={$row['idx']}" class="title">
                                    {$row["title"]}
                                </a>
                            </td>
                            <td>
                                {$row["author"]}
                            </td>
                            <td>
                                {$row["created_at"]}
                            </td>
                        </tr>
            HTML;
        }
        // 문자열 연결 연산자 (.)
        if($type === 'list'){
            $this -> content .= <<<HTML
                    </tbody>
                </table>

                <form action="search.php" method="post">
                    <select name="search_option" id="">
                        <option value="title">제목</option>
                        <option value="author">작성자</option>
                        <option value="content">내용</option>
                    </select>
                    <input type="text" name="search" placeholder="제목을 입력하세요" style="display: inline-block;">
                    <button type="submit">검색</button>
                </form>
                <a href="write.php">글쓰기</a>
            HTML;
        } else if ($type === 'search'){
            $this -> content .= <<<HTML
                    </tbody>
                </table>
                <a href="index.php">목록</a>
            HTML;
        }

        echo $this -> content;
    }

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
                        <th class="thead" width="100">제목</th>
                        <td>
                            {$post['title']}
                        </td>
                    </tr>
                    <tr>
                        <th class="thead" width="100">작성자</th>
                        <td>
                            {$post['author']}
                        </td>
                    </tr>
                    <tr>
                        <th class="thead" width="100">작성일</th>
                        <td>
                            {$post['created_at']}
                        </td>
                    </tr>
                    <tr>
                        <th class="thead" width="100">내용</th>
                        <td>
                            {$post['content']}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a href="index.php">목록</a>
            <a href="write.php?idx={$post['idx']}">수정</a>
            <form action="write_ok.php" method="post" style="display: inline-block;">
                <input type="hidden" name="idx" value="{$post['idx']}">
                <input type="hidden" name="type" value="delete">
                <button type='submit'>삭제</button>
            </form>
        HTML;

        echo $this -> content;
    }

    public function showPostIdx($post){
        $this -> title = "게시글 작성";

        $this -> content = <<<HTML
            <h1>{$this -> title}</h1>
            <form action="write_ok.php" method="post">
                <input type="hidden" name="idx" value="{$post['idx']}">
                <input type="hidden" name="type" value="update">
                <label>
                    제목
                    <input type="text" name="title" value="{$post['title']}">
                    <!-- <input type="text" name="title"> -->
                </label>
                <label>
                    작성자
                    <input type="text" name="author" value="{$post['author']}">
                </label>
                <label>
                    내용
                    <textarea cols="30" rows="10" name="content">{$post['content']}</textarea>
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

    public function showPostComplete($txt){
        $this -> title = "게시글 {$txt} 완료";
        $this -> content = <<<HTML
            <h1>{$this -> title}</h1>
            <a href="index.php">목록으로</a>
        HTML;
        echo $this -> content;
    }
}
?>