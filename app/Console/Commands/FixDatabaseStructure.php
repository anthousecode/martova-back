<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FixDatabaseStructure extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update tables schemas';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {/*
        if (!Schema::hasColumn('users', 'api_token')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('api_token', 36)->nullable();
            });
        }

        if (!Schema::hasTable('news_likes')) {
            Schema::create('news_likes', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id');
                $table->integer('news_id');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('comments')) {
            Schema::create('comments', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('news_id');
                $table->integer('user_id');
                $table->mediumText('text');
                $table->timestamps();
            });
        }

        if (!Schema::hasColumn('users', 'isAdmin')) {
            Schema::table('users', function (Blueprint $table) {
                $table->boolean('isAdmin')->default(false);
            });
        }
        if ((!Schema::hasColumn('areas', 'cad_number')) || (!Schema::hasColumn('areas', 'stroke'))) {
            Schema::table('areas', function (Blueprint $table) {
                $table->string('cad_number')->nullable();
                $table->string('stroke')->nullable();
            });
        }
        if (!Schema::hasColumn('areas', 'polygon')) {
            Schema::table('areas', function (Blueprint $table) {
                $table->text('polygon')->nullable();
            });
        }

        if (!Schema::hasColumn('comments', 'image')) {
            Schema::table('comments', function (Blueprint $table) {
                $table->string('image')->nullable();
            });
        }

        if (!Schema::hasColumn('comments', 'file_type')) {
            Schema::table('comments', function (Blueprint $table) {
                $table->string('file_type')->nullable();
            });
        }

        if (!Schema::hasColumn('areas', 'print_plan')) {
            Schema::table('areas', function (Blueprint $table) {
                $table->string('print_plan')->nullable();
            });
        }

        if (!Schema::hasColumn('infrastructures', 'time')) {
            Schema::table('infrastructures', function (Blueprint $table) {
                $table->string('time')->nullable();
            });
        }
        Schema::table('comments', function (Blueprint $table) {
            $table->mediumText('text')->change();
        });
*/

        Schema::table('areas', function (Blueprint $table) {
            $table->float('square', 8, 4)->nullable()->change();
        });


    }
}
