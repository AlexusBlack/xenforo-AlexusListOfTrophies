<?php
class AlexusListOfTrophies_Helpers {
	public static function helperListOfTrophies($userid, $points = '', $limit = 0, $ids = '', $icons_path = '', $link_format = '', $format = '%icon%') {

		// points condition, single value or interval
		if(strpos($points, '-') !== false) {
			$points = explode('-', $points);
			$points[0] = intval($points[0]);
			$points[1] = intval($points[1]);
		} else if($points !== '') {
			$points = intval($points);
		}

		// if id or ids condition specified
		if($ids !== '') {
			$ids = explode(',', $ids);
		}

		$output = '<ul class="ListOfTrophies">';

		$trophyModel = XenForo_Model::create('XenForo_Model_Trophy');
		$list = $trophyModel->getTrophiesForUserId($userid);

		$amount = 0;
		foreach ($list as $key => $value) {
			// if we are on limit
			if($limit != 0 && $amount >= $limit) {
				break;
			}

			// points condition
			if($points !== '') {
				if(is_array($points)) {
					if($value['trophy_points'] < $points[0] || $value['trophy_points'] > $points[1]) continue;
				} else {
					if($value['trophy_points'] != $points) continue;
				}
			}

			// ids condition
			if($ids !== '') {
				if(!in_array($key, $ids)) continue;
			}

			$output .= '<li class="trophy_item">';
			// if we need a link
			if($link_format !== '') {
				$output .= '<a href="' . str_replace('%trophy_id%', $key, $link_format) . '">';
			}
			// if we need points
			$text = str_replace('%points%', $value['trophy_points'], $format);

			// if we need icon
			$icon = '<img src="' . $icons_path . $key . '.png">';
			$text = str_replace('%icon%', $icon, $text);

			if(strpos($text, '%title%') !== false || strpos($text, '%description%') !== false) {
				$value = $trophyModel->prepareTrophy($value);
			}
			// if we need title
			$text = str_replace('%title%', $value['title'], $text);
			// if we need description
			$text = str_replace('%description%', $value['description'], $text);

			$output .= $text;

			if($link_format !== '') {
				$output .= '</a>';
			}
			$output .= '</li>';


			$amount++;
		}

		$output .= '</ul>';

		return $output;

	}
}

?>