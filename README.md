# NSW Government School Enrolments by Head Count 

## Overview

This project is based on the Yii Framewrk and contains Models and Views to support the fetching of NSW Government School enrolment by head count data and displaying them.

## Code Sample

Here is an example of how to implement this in a controller:

```
...

use app\models\Cache;
use app\models\Import\Import;
use app\models\Import\Adapter\RemoteFileAdapter;
use app\models\School\SchoolParser;

...

    public function actionIndex()
    {
        $cache = new Cache('head-count', 60); // 60 seconds
        $data = $cache->get();
        if ($data === false) {
            $url = 'https://data.cese.nsw.gov.au/data/dataset/1a8ee944-e56c-3480-aaf9-683047aa63a0/resource/64f0e82f-f678-4cec-9283-0b343aff1c61/download/headcount.json';

            $adapter = new RemoteFileAdapter($url);
            $importer = new Import($adapter);
            $data = $importer->fetch();

            $cache->set($data);
        }

        $schoolParser = new SchoolParser();
        $schools = $schoolParser->parse($data);

        return $this->render(
            'index',
            [
                'schools' => $schools,
                'session' => Yii::$app->session,
            ]);
    }
```

### To-Do List

- [x] Create Model
- [x] Create View
- [x] Refresh Data
- [x] Usage instructions
- [ ] Write tests
- [ ] Admin-stats view\
