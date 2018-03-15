<?php
/**
 * Created by PhpStorm.
 * User: denis
 * Date: 15.03.18
 * Time: 1:29
 */

namespace app\commands;

use yii\console\Controller;
use ruskid\csvimporter\CSVImporter;
use ruskid\csvimporter\CSVReader;
use ruskid\csvimporter\MultipleImportStrategy;
use ruskid\csvimporter\ARImportStrategy;


class ImportDataController extends Controller
{
    /**
     * @param string $filename.
     */
    public function actionIndex($filename)
    {
        $tags = [];
        $articlesTags = [];

        $importer = new CSVImporter;

        $importer->setData(new CSVReader([
            //'filename' => '/home/denis/test.csv',
            'filename' => $filename,
        ]));

        $importer->import(new MultipleImportStrategy([
            'tableName' => \app\models\ImageFile::tableName(),
            'configs' => [
                [
                    'attribute' => 'title',
                    'value' => function($line) {
                        return $line[5];
                    },
                ],
                [
                    'attribute' => 'description',
                    'value' => function($line) {
                        return $line[5];
                    },
                ],
                [
                    'attribute' => 'file_name',
                    'value' => function($line) {
                        return $line[10];
                    },
                    'unique' => true,
                ],
                [
                    'attribute' => 'created_at',
                    'value' => function($line) {
                        return (new \DateTime())->setTimestamp((int)$line[30])->format('Y-m-d H:i:s');
                    },
                ],
                [
                    'attribute' => 'updated_at',
                    'value' => function($line) {
                        return (new \DateTime())->setTimestamp((int)$line[32])->format('Y-m-d H:i:s');
                    },
                ],
                [
                    'attribute' => 'is_deleted',
                    'value' => function($line) {
                        return 0;
                    },
                ],
            ],
        ]));

        $importer->import(new MultipleImportStrategy([
            'tableName' => \app\models\Article::tableName(),
            'configs' => [
                [
                    'attribute' => 'title',
                    'value' => function($line) use (&$tags, &$articlesTags) {

                        $tagsList = \array_map(
                            function ($value) {
                                return \trim($value);
                            },
                            \explode(',', $line[39])
                        );
                        $articlesTags[] = $tagsList;

                        foreach ($tagsList as $tag) {
                            if ( ! \in_array($tag, $tags)) {
                                $tags[] = $tag;
                            }
                        }

                        return $line[5];
                    },
                ],
                [
                    'attribute' => 'text',
                    'value' => function($line) {
                        return $line[11];
                    },
                ],
                [
                    'attribute' => 'description',
                    'value' => function($line) {
                        return $line[12];
                    },
                ],
                [
                    'attribute' => 'header_image_id',
                    'value' => function($line) {
                        return (new \yii\db\Query())->from('image_files')->where(['file_name' => $line[10]])->one()['id'];
                    },
                ],
                [
                    'attribute' => 'type',
                    'value' => function($line) {
                        return [
                            3 => \app\models\Article::TYPE_ECONOMICS,
                            4 => \app\models\Article::TYPE_EVENTS,
                            5 => \app\models\Article::TYPE_POLITICS,
                            7 => \app\models\Article::TYPE_SOCIETY,
                            23 => \app\models\Article::TYPE_VIDEO,
                            24 => \app\models\Article::TYPE_HISTORY,
                        ][$line[2]];
                    },
                ],
                [
                    'attribute' => 'created_at',
                    'value' => function($line) {
                        return (new \DateTime())->setTimestamp((int)$line[30])->format('Y-m-d H:i:s');
                    },
                ],
                [
                    'attribute' => 'updated_at',
                    'value' => function($line) {
                        return (new \DateTime())->setTimestamp((int)$line[30])->format('Y-m-d H:i:s');
                    },
                ],
                [
                    'attribute' => 'is_deleted',
                    'value' => function($line) {
                        return 0;
                    },
                ],
            ],
        ]));

        foreach ($tags as $tag) {
            if ($tag) {
                $this->insert(
                    'tags',
                    [
                        'name' => $tag,
                        'is_deleted' => 0,
                        'created_at' => (new \DateTime())->format('Y-m-d H:i:s'),
                        'updated_at' => (new \DateTime())->format('Y-m-d H:i:s'),
                    ]
                );
            }
        }

        $key = 0;
        $articlesIds = (new \yii\db\Query())->select('id')->from('articles')->column();
        foreach ($articlesIds as $articleId) {
            foreach ($articlesTags[$key] as $articleTag) {
                if ($articleTag) {
                    $this->insert(
                        'articles_tags',
                        [
                            'article_id' => $articleId,
                            'tag_id' => (new \yii\db\Query())->from('tags')->where(['name' => $articleTag])->one()['id'],
                            'is_deleted' => 0,
                            'created_at' => (new \DateTime())->format('Y-m-d H:i:s'),
                            'updated_at' => (new \DateTime())->format('Y-m-d H:i:s'),
                        ]
                    );
                }
            }

            $key += 1;
        }
    }
}