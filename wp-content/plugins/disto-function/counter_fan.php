<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! function_exists( 'disto_counter_num' ) ) {
	function disto_counter_num( $number ) {
		$number = intval( $number );
		if ( $number > 1000000 ) {
			$number = round( $number / 1000000, 2 ) .'m';
		} elseif ( $number > 10000 ) {
			$number = round( $number / 1000, 1 ) . 'k';
		} elseif ( $number > 1000 ) {
			$number = round( $number / 1000, 2 ) . 'k';
		}
		return $number;
	}
}
if ( ! class_exists( 'disto_jl_social_fan' ) ) {
	class disto_jl_social_fan {
			
		static function count_facebook( $url, $token = '' ) {

			if ( empty( $url ) ) {
				return false;
			}

			$params = array(
				'sslverify' => false,
				'timeout'   => 100
			);

			// set token
			if ( ! empty( $token ) ) {
				$response = wp_remote_get( 'https://graph.facebook.com/v2.9/' . urlencode( $url ) . '?access_token=' . $token . '&fields=fan_count', $params );
				if ( ! is_wp_error( $response ) && isset( $response['response']['code'] ) && '200' == $response['response']['code'] ) {
					$response = json_decode( wp_remote_retrieve_body( $response ) );
					if ( ! empty( $response->fan_count ) ) {
						return $response->fan_count;
					}
				}
			}

			$filter = array(
				array(
					'start_1' => 'id="PagesLikesCountDOMID"',
					'start_2' => '<span',
					'start_3' => '>',
					'end_4'   => '<span',
				),
				array(
					'start_1' => '["PagesLikesTab","renderLikesData",["',
					'start_2' => '},',
					'start_3' => '],',
					'end_4'   => '],[]],["PagesLikesTab"',
				)
			);

			$response = wp_remote_get( 'https://www.facebook.com/' . $url );

			if ( is_wp_error( $response ) || empty( $response['response']['code'] ) || '200' != $response['response']['code'] ) {
				$response = wp_remote_get( 'https://www.facebook.com/' . $url, $params );
			}

			if ( ! is_wp_error( $response ) && ! empty( $response['response']['code'] ) && '200' == $response['response']['code'] ) {

				// get content
				$response = wp_remote_retrieve_body( $response );

				if ( ! empty( $response ) && $response !== false ) {

					$flag            = false;
					$response_backup = $response;

					foreach ( $filter as $filter_el ) {
						$response = $response_backup;
						foreach ( $filter_el as $key => $value ) {

							$key = explode( '_', $key );
							$key = $key[0];

							if ( $key == 'start' ) {
								$key = false;
							} elseif ( $value == 'end' ) {
								$key = true;
							}

							$key = (bool) $key;

							$index = strpos( $response, $value );
							if ( $index === false ) {
								break;
							}

							if ( $key ) {
								$response = substr( $response, 0, $index );
								$flag     = true;

							} else {
								$response = substr( $response, $index + strlen( $value ) );
							}
						}

						// exit if found
						if ( $flag ) {
							break;
						}
					}

					if ( strlen( $response ) < 150 ) {
						$count = self::extract_one_number( $response );

						if ( is_numeric( $count ) && strlen( number_format( $count ) ) < 16 ) {
							return intval( $count );
						}
					}
				}
			};

			return false;

		}

		
		static function count_google( $user, $api ) {

			if ( empty( $user ) || empty( $api ) ) {
				return false;
			}

			$url      = 'https://www.googleapis.com/plus/v1/people/' . $user . '?key=' . $api . '';
			$args     = array( 'timeout' => 60, 'sslverify' => false );
			$response = wp_remote_get( $url, $args );

			if ( is_wp_error( $response ) || empty( $response['response']['code'] ) || '200' != $response['response']['code'] ) {
				return false;
			}

			$response = wp_remote_retrieve_body( $response );
			$response = json_decode( $response, true );
			if ( isset( $response['circledByCount'] ) ) {
				$result = (int) $response['circledByCount'];

				return $result;
			} else {
				return false;
			}
		}
		
		static function count_twitter( $user, $api = array() ) {

			if ( empty( $user ) ) {
				return false;
			}

			if ( ! empty( $api['consumer_key'] ) && ! empty( $api['consumer_secret'] ) ) {

				$credentials = $api['consumer_key'] . ':' . $api['consumer_secret'];
				$to_send     = base64_encode( $credentials );
				$token       = get_option( 'tn_twitter_token' );

				if ( empty( $token ) ) {
					$args = array(
						'method'      => 'POST',
						'httpversion' => '1.1',
						'blocking'    => true,
						'headers'     => array(
							'Authorization' => 'Basic ' . $to_send,
							'Content-Type'  => 'application/x-www-form-urlencoded',
						),
						'body'        => array( 'grant_type' => 'client_credentials' )
					);
					add_filter( 'https_ssl_verify', '__return_false' );
					$response = wp_remote_post( 'https://api.twitter.com/oauth2/token', $args );
					$keys     = json_decode( wp_remote_retrieve_body( $response ) );
					if ( $keys ) {
						$token = $keys->access_token;
						update_option( 'tn_twitter_token', $token );
					};
				}

				$args = array(
					'httpversion' => '1.1',
					'blocking'    => true,
					'headers'     => array(
						'Authorization' => "Bearer $token"
					)
				);
				add_filter( 'https_ssl_verify', '__return_false' );
				$api_url  = "https://api.twitter.com/1.1/users/show.json?screen_name=$user";
				$response = wp_remote_get( $api_url, $args );
				if ( ! is_wp_error( $response ) ) {
					$followers = json_decode( wp_remote_retrieve_body( $response ) );
					if ( ! empty( $followers->followers_count ) ) {
						return $followers->followers_count;
					}
				}
			}

			$params = array(
				'timeout'   => 60,
				'sslverify' => false
			);

			$filter = array(
				'start_1' => 'ProfileNav-item--followers',
				'start_2' => 'title',
				'end'     => '>'
			);

			$response = wp_remote_get( 'https://twitter.com/' . $user, $params );

			if ( is_wp_error( $response ) || empty( $response['response']['code'] ) || '200' != $response['response']['code'] ) {
				return false;
			}

			$response = wp_remote_retrieve_body( $response );

			if ( ! empty( $response ) && $response !== false ) {
				foreach ( $filter as $key => $value ) {

					$key = explode( '_', $key );
					$key = $key[0];

					if ( $key == 'start' ) {
						$key = false;
					} else if ( $value == 'end' ) {
						$key = true;
					}
					$key = (bool) $key;

					$index = strpos( $response, $value );
					if ( $index === false ) {
						return false;
					}
					if ( $key ) {
						$response = substr( $response, 0, $index );
					} else {
						$response = substr( $response, $index + strlen( $value ) );
					}
				}

				if ( strlen( $response ) > 100 ) {
					return false;
				}

				$count = self::extract_one_number( $response );

				if ( ! is_numeric( $count ) || strlen( number_format( $count ) ) > 15 ) {
					return false;
				}

				$count = intval( $count );

				return $count;
			} else {
				return false;
			}
		}


		static function extract_one_number( $str ) {
			return intval( preg_replace( '/[^0-9]+/', '', $str ), 10 );
		}

		
		static function count_instagram( $api ) {

			if ( empty( $api ) ) {
				return false;
			}

			$users = explode( ".", $api );
			if ( empty( $users[0] ) ) {
				return false;
			}
			$data = array();
			$url  = 'https://api.instagram.com/v1/users/' . $users[0] . '/?access_token=' . $api;

			$params = array(
				'sslverify' => false,
				'timeout'   => 60
			);

			$response = wp_remote_get( $url, $params );

			if ( is_wp_error( $response ) || empty( $response['response']['code'] ) || '200' != $response['response']['code'] ) {
				return false;
			}

			$response = json_decode( wp_remote_retrieve_body( $response ), true );
			if ( empty( $response['data']['counts']['followed_by'] ) || empty( $response['data']['username'] ) ) {
				return false;
			}

			$data['count']     = $response['data']['counts']['followed_by'];
			$data['user_name'] = $response['data']['username'];
			$data['url']       = 'https://instagram.com/' . $data['user_name'];

			return $data;
		}

		
		static function  count_dribbble( $user, $token ) {
			if ( empty( $user ) || empty( $token ) ) {
				return false;
			}

			$params = array(
				'sslverify' => false,
				'timeout'   => 60,
			);

			$response = wp_remote_get( 'https://api.dribbble.com/v1/users/' . $user . '?access_token=' . $token, $params );

			if ( is_wp_error( $response ) || empty( $response['response']['code'] ) || '200' != $response['response']['code'] ) {
				return false;
			}

			$response = json_decode( wp_remote_retrieve_body( $response ) );
			if ( ! empty( $response->followers_count ) ) {
				return $response->followers_count;
			} else {
				return false;
			}
		}

		
		static function count_youtube( $user, $channel ) {

			if ( empty( $user ) && empty ( $channel ) ) {
				return false;
			};

			if ( ! empty( $user ) ) {
				$url = "https://www.googleapis.com/youtube/v3/channels?part=statistics&forUsername=" . $user . "&key=AIzaSyD-285A_JgDpjbEFnXYzjYXo0Vwi64txKE";
			} else {
				$url = 'https://www.googleapis.com/youtube/v3/channels?part=statistics&id=' . $channel . '&key=AIzaSyD-285A_JgDpjbEFnXYzjYXo0Vwi64txKE';
			};

			$params = array(
				'sslverify' => false,
				'timeout'   => 60
			);

			$response = wp_remote_get( $url, $params );

			if ( is_wp_error( $response ) || empty( $response['response']['code'] ) || '200' != $response['response']['code'] ) {
				return false;
			}

			$response = json_decode( wp_remote_retrieve_body( $response ) );
			if ( ! empty( $response->items[0]->statistics->subscriberCount ) ) {
				return $response->items[0]->statistics->subscriberCount;
			} else {
				return false;
			}
		}

		
		static function count_soundclound( $user, $api ) {

			if ( empty( $user ) || empty( $api ) ) {
				return false;
			}

			$url      = 'https://api.soundcloud.com/users/' . $user . '.json?consumer_key=' . $api;
			$response = wp_remote_get( $url, array( 'timeout' => 60 ) );

			if ( is_wp_error( $response ) || empty( $response['response']['code'] ) || '200' != $response['response']['code'] ) {
				return false;
			}

			$response = json_decode( wp_remote_retrieve_body( $response ), true );
			if ( empty( $response['followers_count'] ) || empty( $response['permalink_url'] ) ) {
				return false;
			};
			$data['count'] = esc_attr( $response['followers_count'] );
			$data['url']   = esc_url( $response['permalink_url'] );

			return $data;
		}


		static function count_pinterest( $user ) {

			if ( empty( $user ) ) {
				return false;
			}

			$response = get_meta_tags( 'https://pinterest.com/' . $user . '/' );
			if ( ! empty( $response ) && ! empty( $response['pinterestapp:followers'] ) ) {
				return intval( strip_tags( $response['pinterestapp:followers'] ) );
			} else {
				return false;
			}
		}

		
		static function count_vimeo( $user ) {

			if ( empty( $user ) ) {
				return false;
			};

			$params = array(
				'sslverify' => false,
				'timeout'   => 60
			);

			$url      = 'https://vimeo.com/api/v2/' . $user . '/info.json';
			$response = wp_remote_get( $url, $params );

			if ( is_wp_error( $response ) || empty( $response['response']['code'] ) || '200' != $response['response']['code'] ) {
				return false;
			}

			$response = json_decode( wp_remote_retrieve_body( $response ) );
			if ( ! empty( $response->total_contacts ) ) {
				return $response->total_contacts;
			} else {
				return false;
			}
		}

		
		static function count_vk( $user ) {
			if ( empty( $user ) ) {
				return false;
			};

			$params = array(
				'sslverify' => false,
				'timeout'   => 60
			);

			$url      = 'https://api.vk.com/method/groups.getById?gid=' . $user . '&fields=members_count';
			$response = wp_remote_get( $url, $params );

			if ( is_wp_error( $response ) || empty( $response['response']['code'] ) || '200' != $response['response']['code'] ) {
				return false;
			}

			$response = json_decode( wp_remote_retrieve_body( $response ) );
			if ( ! empty( $response->response[0]->members_count ) ) {
				$result = $response->response[0]->members_count;
			}

			if ( ! empty( $result ) ) {
				return $result;
			} else {
				return false;
			}
		}

		
		static function jl_get_social_counter( $social = '', $option = array() ) {

			$cache_data_name = 'disto_social_fan_' . $social;
			$cache           = get_transient( $cache_data_name );

			if ( false === $cache ) {
				$data        = '';
				$cache_hours = 12;

				switch ( $social ) {
					case 'facebook_page' :
						$data = self::count_facebook( $option['facebook_page'], $option['facebook_token'] );
						set_transient( $cache_data_name, $data, 60 * 60 * $cache_hours );
						break;
					case 'google' :
						$data = self::count_google( $option['google_user'], $option['google_api'] );
						set_transient( $cache_data_name, $data, 60 * 60 * $cache_hours );
						break;
					case 'twitter' :
						$data = self::count_twitter( $option['twitter_user'], $option['twitter_api'] );
						set_transient( $cache_data_name, $data, 60 * 60 * $cache_hours );
						break;
					case 'instagram' :
						$data = self::count_instagram( $option['instagram_api'] );
						set_transient( $cache_data_name, $data, 60 * 60 * $cache_hours );
						break;
					case 'youtube' :
						$data = self::count_youtube( $option['youtube_user'], $option['youtube_channel'] );
						set_transient( $cache_data_name, $data, 60 * 60 * $cache_hours );
						break;
					case 'dribbble' :
						$data = self::count_dribbble( $option['dribbble_user'], $option['dribbble_token'] );
						set_transient( $cache_data_name, $data, 60 * 60 * $cache_hours );
						break;
					case 'pinterest' :
						$data = self::count_pinterest( $option['pinterest_user'] );
						set_transient( $cache_data_name, $data, 60 * 60 * $cache_hours );
						break;
					case 'soundcloud' :
						$data = self::count_soundclound( $option['soundcloud_user'], $option['soundcloud_api'] );
						set_transient( $cache_data_name, $data, 60 * 60 * $cache_hours );
						break;
					case 'vimeo' :
						$data = self::count_vimeo( $option['vimeo_user'] );
						set_transient( $cache_data_name, $data, 60 * 60 * $cache_hours );
						break;
					case 'vk' :
						$data = self::count_vk( $option['vk_user'] );
						set_transient( $cache_data_name, $data, 60 * 60 * $cache_hours );
						break;
				}

				return $data;
			} else {
				return $cache;
			}
		}
	}
}
