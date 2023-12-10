<?php
require_once('controllers/main/base_controller.php');
require_once('models/news.php');
require_once('models/comment.php');

class BlogController extends BaseController
{
	function __construct()
	{
		$this->folder = 'blog';
	}

	public function index()
	{
		$currentPage = isset($_GET['pg']) ? $_GET['pg'] : 1;
        $postsPerPage = 3;

		$newses = News::getAllShow();
		$recent = News::recentNews();
		foreach ($newses as $news)
		{
			$news->comments = Comment::getCommentByNews($news->id);
			foreach ($news->comments as $comment)
			{
				$comment->replies = Comment::getReply(intval($comment->id));
			}
		}
		foreach ($recent as $news)
		{
			$news->comments = Comment::getCommentByNews($news->id);
			foreach ($news->comments as $comment)
			{
				$comment->replies = Comment::getReply(intval($comment->id));
			}
		}
		$totalPages = ceil(count($newses) / $postsPerPage);
        $startIndex = ($currentPage - 1) * $postsPerPage;
        $endIndex = $startIndex + $postsPerPage;

        $newses = array_slice($newses, $startIndex, $endIndex);

        $data = array('newses' => $newses, 'recent' => $recent, 'currentPage' => $currentPage, 'totalPages' => $totalPages);
        $this->render('index', $data);
	}

	public function reply()
	{
		$content = $_POST['content'];
		$news_id = $_POST['news_id'];
		$user_id = $_POST['user_id'];
		$parent = $_POST['parent'];

		$req = Comment::reply($content, $news_id, $user_id, $parent);
		echo 'success';
		exit();
	}

	public function comment()
	{
		$content = $_POST['content'];
		$news_id = $_POST['news_id'];
		$user_id = $_POST['user_id'];

		$req = Comment::insert($content, $news_id, $user_id);
		echo 'success';
		exit();
	}
}

?>