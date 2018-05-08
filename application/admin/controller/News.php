<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;
use app\common\controller\Editor;

/**
 *
 * @author ljq
 *         新闻管理
 */
class News extends Controller
{

    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index($page = "", $limit = "", $keyword = "")
    {
        if (! isset($count)) {
            $this->count = Db::name("news")->count();
            if ($this->count == 0) {
                $this->assign("none", "none");
            }
        }
        if ($this->request->isAjax()) {
            // $res = json_decode(httpGet("http://www.layui.com/demo/table/user?page={$this->request->get('page')}&limit={$this->request->get('limit')}"));
            $result = Db::name("news")->order("createtime desc")
                ->where("name", 'like', "%" . $keyword . "%")
                ->page($page, $limit)
                ->select();
            
            return json([
                'code' => 0,
                'msg' => "",
                "count" => ($keyword == "") ? $this->count : count($result),
                "data" => $result
            ]);
        }
        return $this->fetch();
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return $this->fetch('edit');
    }

    /**
     * 保存新建的资源
     *
     * @param \think\Request $request            
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $post = $request->post();
        $editor = new Editor($post['content']);
        $editor->imageDel();
        $editor->imageTrans();
        $post['content'] = $editor->getContent();
        $data = [
            'name' => trim($post['data']['name']),
            'content' => $post['content'],
            'status' => 1,
            'createtime' => date("Y-m-d H:i:s")
        ];
        if (Db::name("news")->insert($data) == 1) {
            return 1;
        }
    }

    /**
     * 显示指定的资源
     *
     * @param int $id            
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param int $id            
     * @return \think\Response
     */
    public function edit($id)
    {
        $data = Db::name("news")->where("newsid", $id)
            ->field("newsid,name,content")
            ->find();
        $this->assign("data", $data);
        return $this->fetch("edit");
        //
    }

    /**
     * 保存更新的资源
     *
     * @param \think\Request $request            
     * @param int $id            
     * @return \think\Response
     */
    public function update(Request $request)
    {
        $post = $request->post();
        $editor = new Editor($post['content']);
        $editor->setOldContent($post['oldContent']);
        $editor->imageDel();
        $editor->imageTrans();
        $post['content'] = $editor->getContent();
        if (Db::name("news")->where("newsid", $post['newsid'])->update([
            'content' => $post['content'],
            'name' => $post['data']['name']
        ]) >= 0) {
            return 1;
        }
    }

    /**
     * 状态变更
     *
     * @return int
     */
    public function statusChange()
    {
        $post = $this->request->post();
        if (Db::name('news')->where("newsid", $post['newsid'])->update([
            'status' => $post['status']
        ])) {
            return 1;
        } else {
            return 0;
        }
    }

    /**
     * 删除指定资源
     *
     * @param int $id            
     * @return \think\Response
     */
    public function delete()
    {
        $post = $this->request->post();
        $content = Db::name("news")->where("newsid", $post['newsid'])->value("content");
        $editor = new Editor($content);
        
        if (Db::name('news')->where("newsid", $post['newsid'])->delete()) {
            $editor->delAllImage();
            return 1;
        } else {
            return 0;
        }
    }
}
