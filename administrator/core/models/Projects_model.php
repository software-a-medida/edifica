<?php
defined('_EXEC') or die;

class Projects_model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function count_slideshow( $slide = null )
	{
		return $this->database->count('slideshows', [
			"{$slide}[!]" => null
		]);
	}

	public function insert_project_sale( $data = null )
	{
		if ( is_null($data) )
		/*  */ return;

		$this->database->insert('projects', [
			'url' => $data['url'],
			'type' => 'sale',
			'data' => [
				'name' => $data['name'],
				'title' => $data['title'],
				'price' => $data['price'],
				'price_text' => $data['price_text'],
				'map_lat' => $data['map_lat'],
				'map_long' => $data['map_long'],
				'slide_home' => $data['slide_home'],
				'slide_portfolio' => $data['slide_portfolio'],
				'description' => $data['description']
			]
		]);

		$id_project = $this->database->id();

		$media = [
			[
				'id_key' => $id_project,
				'table' => 'projects',
				'mime' => ( !is_null($data['image_cover']) ) ? mime_content_type(Security::DS(PATH_UPLOADS . $data['image_cover']['file'])) : null,
				'var_key' => 'image_cover',
				'value' => ( !is_null($data['image_cover']) ) ? $data['image_cover']['file'] : null
			],
			[
				'id_key' => $id_project,
				'table' => 'projects',
				'mime' => ( !is_null($data['project_logotype']) ) ? mime_content_type(Security::DS(PATH_UPLOADS . $data['project_logotype']['file'])) : null,
				'var_key' => 'project_logotype',
				'value' => ( !is_null($data['project_logotype']) ) ? $data['project_logotype']['file'] : null
			],
			[
				'id_key' => $id_project,
				'table' => 'projects',
				'mime' => ( !is_null($data['image_content']) ) ? mime_content_type(Security::DS(PATH_UPLOADS . $data['image_content']['file'])) : null,
				'var_key' => 'image_content',
				'value' => ( !is_null($data['image_content']) ) ? $data['image_content']['file'] : null
			],
			[
				'id_key' => $id_project,
				'table' => 'projects',
				'mime' => ( !is_null($data['project_croquis']) ) ? mime_content_type(Security::DS(PATH_UPLOADS . $data['project_croquis']['file'])) : null,
				'var_key' => 'project_croquis',
				'value' => ( !is_null($data['project_croquis']) ) ? $data['project_croquis']['file'] : null
			],
			[
				'id_key' => $id_project,
				'table' => 'projects',
				'mime' => ( !is_null($data['brochure']) ) ? mime_content_type(Security::DS(PATH_UPLOADS . $data['brochure']['file'])) : null,
				'var_key' => 'brochure',
				'value' => ( !is_null($data['brochure']) ) ? $data['brochure']['file'] : null
			],
		];

		if ( !is_null($data['gallery']) )
		{
			foreach ( $data['gallery'] as $key => $value )
			{
				array_push($media, [
					'id_key' => $id_project,
					'table' => 'projects',
					'mime' => mime_content_type(Security::DS(PATH_UPLOADS . $value['file'])),
					'var_key' => 'gallery',
					'value' => $value['file']
				]);
			}
		}

		$this->database->insert('media', $media);

		if ( !is_null($data['slide_home']) || !is_null($data['slide_portfolio']) )
		{
			$this->database->insert('slideshows', [
				'id_key' => $id_project,
				'table' => 'projects',
				'pos_home' => $data['slide_home'],
				'pos_portfolio' => $data['slide_portfolio'],
			]);
		}

		return [ 'status' => 'OK' ];
	}

	public function insert_project_under_construction( $data = null )
	{
		if ( is_null($data) )
		/*  */ return;

		$this->database->insert('projects', [
			'url' => null,
			'type' => 'under_construction',
			'data' => [
				'name' => $data['name'],
				'title' => $data['title'],
				'slide_home' => $data['slide_home'],
				'slide_portfolio' => $data['slide_portfolio']
			]
		]);

		$id_project = $this->database->id();

		$media = [
			[
				'id_key' => $id_project,
				'table' => 'projects',
				'mime' => ( !is_null($data['image_cover']) ) ? mime_content_type(Security::DS(PATH_UPLOADS . $data['image_cover']['file'])) : null,
				'var_key' => 'image_cover',
				'value' => ( !is_null($data['image_cover']) ) ? $data['image_cover']['file'] : null
			]
		];

		if ( !is_null($data['gallery']) )
		{
			foreach ( $data['gallery'] as $key => $value )
			{
				array_push($media, [
					'id_key' => $id_project,
					'table' => 'projects',
					'mime' => mime_content_type(Security::DS(PATH_UPLOADS . $value['file'])),
					'var_key' => 'gallery',
					'value' => $value['file']
				]);
			}
		}

		$this->database->insert('media', $media);

		if ( !is_null($data['slide_home']) || !is_null($data['slide_portfolio']) )
		{
			$this->database->insert('slideshows', [
				'id_key' => $id_project,
				'table' => 'projects',
				'pos_home' => $data['slide_home'],
				'pos_portfolio' => $data['slide_portfolio'],
			]);
		}

		return [ 'status' => 'OK' ];
	}

	public function insert_project_finished( $data = null )
	{
		if ( is_null($data) )
		/*  */ return;

		$this->database->insert('projects', [
			'url' => null,
			'type' => 'finished',
			'data' => [
				'name' => $data['name'],
				'title' => $data['title'],
				'slide_home' => $data['slide_home'],
				'slide_portfolio' => $data['slide_portfolio']
			]
		]);

		$id_project = $this->database->id();

		$media = [
			[
				'id_key' => $id_project,
				'table' => 'projects',
				'mime' => ( !is_null($data['image_cover']) ) ? mime_content_type(Security::DS(PATH_UPLOADS . $data['image_cover']['file'])) : null,
				'var_key' => 'image_cover',
				'value' => ( !is_null($data['image_cover']) ) ? $data['image_cover']['file'] : null
			]
		];

		if ( !is_null($data['gallery']) )
		{
			foreach ( $data['gallery'] as $key => $value )
			{
				array_push($media, [
					'id_key' => $id_project,
					'table' => 'projects',
					'mime' => mime_content_type(Security::DS(PATH_UPLOADS . $value['file'])),
					'var_key' => 'gallery',
					'value' => $value['file']
				]);
			}
		}

		$this->database->insert('media', $media);

		if ( !is_null($data['slide_home']) || !is_null($data['slide_portfolio']) )
		{
			$this->database->insert('slideshows', [
				'id_key' => $id_project,
				'table' => 'projects',
				'pos_home' => $data['slide_home'],
				'pos_portfolio' => $data['slide_portfolio'],
			]);
		}

		return [ 'status' => 'OK' ];
	}

	public function projects($type, $id = null)
	{
		$where = [ 'type' => $type, ];

		if ( !is_null($id) && is_numeric($id) )
		/*  */ $where['id'] = $id;

		$projects = $this->database->select('projects', [
			'id',
			'url',
			'type',
			'data [Object]'
		], $where);

		$ids = [];

		foreach ( $projects as $key => $value )
		/*  */ $ids[] = $value['id'];

		$media = $this->database->select('media', [
			'id',
			'id_key',
			'var_key',
			'value'
		], [
			'id_key' => $ids,
		]);

		if ( !empty($media) )
		{
			foreach ( $media as $value )
			{
				$key = array_search($value['id_key'], array_column($projects, 'id'));

				if ( $value['var_key'] !== 'gallery' )
				/*  */ $projects[$key][$value['var_key']] = $value['value'];
				else
				/*  */ $projects[$key]['gallery'][] = ['id' => $value['id'], 'image' => $value['value']];
			}
		}

		return $projects;
	}

	public function update_project_sale( $data = null )
	{
		if ( is_null($data) )
		/*  */ return;

		$this->database->update('projects', [
			'data' => [
				'name' => $data['name'],
				'title' => $data['title'],
				'price' => $data['price'],
				'price_text' => $data['price_text'],
				'map_lat' => $data['map_lat'],
				'map_long' => $data['map_long'],
				'slide_home' => $data['slide_home'],
				'slide_portfolio' => $data['slide_portfolio'],
				'description' => $data['description']
			]
		], [
			'AND' => [
				'id' => $data['id'],
				'type' => 'sale'
			]
		]);

		if ( !is_null($data['brochure']) )
		{
			$this->database->update('media', [
				'value' => $data['brochure']['file']
			], [
				'AND' => [
					'table' => 'projects',
					'var_key' => 'brochure',
					'id_key' => $data['id']
				]
			]);
		}

		if ( !is_null($data['image_cover']) )
		{
			$this->database->update('media', [
				'value' => $data['image_cover']['file']
			], [
				'AND' => [
					'table' => 'projects',
					'var_key' => 'image_cover',
					'id_key' => $data['id']
				]
			]);
		}

		if ( !is_null($data['project_logotype']) )
		{
			$this->database->update('media', [
				'value' => $data['project_logotype']['file']
			], [
				'AND' => [
					'table' => 'projects',
					'var_key' => 'project_logotype',
					'id_key' => $data['id']
				]
			]);
		}

		if ( !is_null($data['image_content']) )
		{
			$this->database->update('media', [
				'value' => $data['image_content']['file']
			], [
				'AND' => [
					'table' => 'projects',
					'var_key' => 'image_content',
					'id_key' => $data['id']
				]
			]);
		}

		if ( !is_null($data['project_croquis']) )
		{
			$this->database->update('media', [
				'value' => $data['project_croquis']['file']
			], [
				'AND' => [
					'table' => 'projects',
					'var_key' => 'project_croquis',
					'id_key' => $data['id']
				]
			]);
		}

		if ( !is_null($data['gallery']) )
		{
			$gallery = [];

			foreach ( $data['gallery'] as $key => $value )
			{
				array_push($gallery, [
					'id_key' => $data['id'],
					'table' => 'projects',
					'mime' => mime_content_type(Security::DS(PATH_UPLOADS . $value['file'])),
					'var_key' => 'gallery',
					'value' => $value['file']
				]);
			}

			$this->database->insert('media', $gallery);
		}

		return [ 'status' => 'OK' ];
	}

	public function update_project_under_construction( $data = null )
	{
		if ( is_null($data) )
		/*  */ return;

		$this->database->update('projects', [
			'data' => [
				'name' => $data['name'],
				'title' => $data['title'],
				'slide_home' => $data['slide_home'],
				'slide_portfolio' => $data['slide_portfolio']
			]
		], [
			'AND' => [
				'id' => $data['id'],
				'type' => 'under_construction'
			]
		]);

		if ( !is_null($data['image_cover']) )
		{
			$this->database->update('media', [
				'value' => $data['image_cover']['file']
			], [
				'AND' => [
					'table' => 'projects',
					'var_key' => 'image_cover',
					'id_key' => $data['id']
				]
			]);
		}

		if ( !is_null($data['gallery']) )
		{
			$gallery = [];

			foreach ( $data['gallery'] as $key => $value )
			{
				array_push($gallery, [
					'id_key' => $data['id'],
					'table' => 'projects',
					'mime' => mime_content_type(Security::DS(PATH_UPLOADS . $value['file'])),
					'var_key' => 'gallery',
					'value' => $value['file']
				]);
			}

			$this->database->insert('media', $gallery);
		}

		return [ 'status' => 'OK' ];
	}

	public function update_project_finished( $data = null )
	{
		if ( is_null($data) )
		/*  */ return;

		$this->database->update('projects', [
			'data' => [
				'name' => $data['name'],
				'title' => $data['title'],
				'slide_home' => $data['slide_home'],
				'slide_portfolio' => $data['slide_portfolio']
			]
		], [
			'AND' => [
				'id' => $data['id'],
				'type' => 'finished'
			]
		]);

		if ( !is_null($data['image_cover']) )
		{
			$this->database->update('media', [
				'value' => $data['image_cover']['file']
			], [
				'AND' => [
					'table' => 'projects',
					'var_key' => 'image_cover',
					'id_key' => $data['id']
				]
			]);
		}

		if ( !is_null($data['gallery']) )
		{
			$gallery = [];

			foreach ( $data['gallery'] as $key => $value )
			{
				array_push($gallery, [
					'id_key' => $data['id'],
					'table' => 'projects',
					'mime' => mime_content_type(Security::DS(PATH_UPLOADS . $value['file'])),
					'var_key' => 'gallery',
					'value' => $value['file']
				]);
			}

			$this->database->insert('media', $gallery);
		}

		return [ 'status' => 'OK' ];
	}

	public function delete_images( $arr = [] )
	{
		$this->database->delete('media', [
			'id' => $arr
		]);
	}
}
