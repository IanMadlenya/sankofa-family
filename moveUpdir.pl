#!/usr/bin/perl
=pod
Simple Perl Script to move all files up
Email: jasonkwh@gmail.com
=cut
use strict;
use File::Copy;
use File::Find;

sub moveFiles() {
  opendir(DIR,'.');
  while (my $files = readdir(DIR)) {
    move($files,"..");
  }
  closedir(DIR);
}

sub removeFolder() {
    chdir "..";
    finddepth(sub { rmdir $_ if -d }, "."); #remove empty directory
}

moveFiles();
removeFolder();
